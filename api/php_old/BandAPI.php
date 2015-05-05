<?php
 /**
 * Created by Franky on 13.04.2015.
 * BandApi in PHP
 */       
//header('Content-Type: application/json');
$APIName = 'API-C2015FK';
$APIVersion = '1.1.0';
$warnings = array(); // warnung für die API
$RESdata = null;

function checkCMD($command1,$actualcommand){
    
   if($command1 == $actualcommand){
       return true;
   } else {
       return false;
   }
};
 

 try
 {
    //--------------------------------------------    
    // vorbereitungen
    //--------------------------------------------
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $command = $request->command;
    $params = $request->params;
    
    
    // kommandos horchen
    // if (!isset($_POST['command'])) {
        // throw new Exception("F02 command unknown: (".$_POST['command'].")!!");
    // } else {
        // $command = $_POST['command'];
    // }
   
   // authentifikation!!!
   // noch nicht fertig
    if (false) {
        // authentifikation fehlgeschalgen!!
        // fehler schmeissen;
        throw new Exception('F01 authentification failed.');       
    }
   
        
    // datenbank aus dem Administratorbereich aufrufen
    include('OnlyConnection.php');    
    //--------------------------------------------    
    // befehle abarbeiten.
    //--------------------------------------------
    
    // neuigkeiten holen
    if (checkCMD($command,'home')) { 
      // bildpfade für die band-ortraits 
      $sql = "SELECT  * from sporenet_articles where (type = 2) ";
      if (isset($params->id)) {
          $sql .= ' and ID='.$params->id;
      }
      
     // korrekte weise, sowas zu machen... Erst abfragen und 
     // dann ein trow wenn der SQL nichg geklappt hat. Sonst sucht man sich einen wolf
      $result = mysqli_query($db, $sql);
      if (!$result) {throw new Exception("Fehler im SQL-Kommando: $sql");};
      while($row = $result->fetch_array())
      {
        $RESdata[] = $row;
        
      }
    };
    
    // bandmitglieder vorstellungen
    if (checkCMD($command,'getBandQuestions')) {
      include('php/OnlyConnection.php');  
      
      $sql = "SELECT  * from sporenet_users";
      $result = mysqli_query($db, $sql);   
      while($row = mysqli_fetch_assoc($result)) {
          //für jede person die fragen ranholen.
          $sql1 = "SELECT q.question,r.answer,u.viewname from sporenet_articles_bandquestions q ". 
            "join sporenet_articles_bandresponses r on (q.id=r.questionnumber) ".
            "join sporenet_users u on (r.user=u.id) ".
            "where u.id = ".$row['id']." order by q.id asc";
          $ures = mysqli_query($db, $sql1);
          if (!$ures) {throw new Exception("Fehler im SQL-Kommando: $sql1");};
          while($urow = mysqli_fetch_assoc($ures)) {
               $RESdata[$row['id']][] = $urow;
          }
      }
    };
    
    
    //--------------------------------------------    
    // abschicken
    //--------------------------------------------
    // prüfen ob nach dem ausführenden block noch die arr variable gesetzt wurde..       
    if (!isset($RESdata)) {
        $warnings[] = 'result set is NULL after execute block.';       
    };
   
    echo json_encode(
        array(
            'inputCommand'=>$command,
            'paramsCommand'=>$params,
            'warnings'=>$warnings,
            'RESdata'=>$RESdata
        )
    );
 } catch (Exception $e)  {
    // falls fehler auftauchen, kann man das mit dieser routine feststellen. 
    $error = 'Fehler in der '.$APIName.', Version '.$APIVersion.': '.$e->getMessage();
    $RESdata = array('globalApiError' => $error);
    echo json_encode($RESdata);
 }
?>
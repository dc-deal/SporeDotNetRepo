<?php
try
{
	// kommando
	if (!isset($_POST['command'])) {
		 throw new  Exception('Kommando nicht erkannt'); 
	} else{ $command = $_POST['command']; }
	
	
	// kommandobehandlung
	switch ($command) {
    case "getnews":
        include("dbOperations/getnews.php");
		break;
    case "test":
        echo "test";
        break;
    case "test2":
        echo "test2";
        break;
	}
	
	
	// abschicken
	if(!isset($GLOBALS["arr"])) {throw new  Exception('Keine Daten aus dem Befehl erhalten'); }
	else{ jason_encode($GLOBALS["arr"]); }
}
catch (Exception $e) {
	$message = 'API Error: '.$e->getMessage();
	jason_encode(array('error'=>$message));	
}

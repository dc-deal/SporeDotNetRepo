<?phpif (!isset($_SESSION["username"])) {    die('sie haben keine Berechtigung, hierauf zuzugreifen.');}//var_dump( $_POST);// auf benutzer löschen reagieren.if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['ArcBTT'])) {    //var_dump($_POST['ArcBTT']);    foreach ($_POST['ArcBTT'] as $col => $val) {        $sql = "update vbinfo_anfragen set ARCHIVE = 1 where ID =" . $col;        $result = mysqli_query($db, $sql) or exit("Fehler im SQL-Kommando: $sql");        //echo "$sql";    }}if (!isset($_POST['VON'])) {    $dvon = strtotime(date('d.m.Y'));    // Timestamp wird erstellt    $dvon = $dvon - 604800 * 2;    // -14 tage}else {    $dvon = strtotime($_POST['VON']);}if (!isset($_POST['BIS'])) {    $dbis = strtotime(date('d.m.Y')) + 863990;}else {    $dbis = strtotime($_POST['BIS']);}if ($_SERVER['REQUEST_METHOD'] == "POST") {    if (isset($_POST['ARCHIV'][0])) {        // wie soll ich das machen wenn archive nicht da ist!??!        $arc = 1;        $_SESSION['ARCHIV'] = 1;    }    else {        $arc = 0;            $_SESSION['ARCHIV'] = 0;    }        if (isset($_POST['MITSTEUER'][0])) {        // wie soll ich das machen wenn archive nicht da ist!??!        $steuer = 1;        $_SESSION['1MITSTEUER'] = 1;    }    else {        $steuer = 0;            $_SESSION['1MITSTEUER'] = 0;    }            }   else {    $arc = $_SESSION['ARCHIV'];    $steuer = $_SESSION['1MITSTEUER'];}// SQL-Anfrage: Ergebnis ist stets eine Tabelle//echo $dvon;//echo $dbis;$sql = "SELECT  T.BEZEICHNUNG,ANTRAGSART,ARCHIVE,A.ID as NUMMER,DATE_FORMAT(DATUM, '%d.%m.%Y um %H:%i') AS datum_formatiert".",Vorname,Nachname,STRASSE,POSTLEITZAHL,ORT,EMAIL,TELEFON,BEMERKUNGEN," . "BenutzerNrFlyer,A.ID";if($steuer == 1){    $sql .= ",Rechtsform,Jahresgesameinkuenfte,EinkuenfteVermietung,EinkuenftePhotovoltaik,RechnungsbetragSteuerberater,BisherigeGKV,SingleOderFamilie";  }$sql .= " FROM vbinfo_anfragen A " . " join vbinfo_gender G on (A.Anrede=G.ID)" ."  join  vbinfo_anfragen_types T on (A.ANTRAGSART=T.ID)". " where DATUM BETWEEN '" . date("Y-m-d H:i:s", "$dvon") . "' and '" . date("Y-m-d H:i:s", "$dbis")  . "' and (ARCHIVE = 0 " . " or ARCHIVE = $arc) " . " order by DATUM desc";// Anfrage ausführen$result = mysqli_query($db, $sql) or exit("Fehler im SQL-Kommando: $sql");// FORM AUFRUFEN!!! YEAH.if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['FrmBTT'])) {    ?> </table> <?php // tasble abschliessen da in index form so gegeben GRMPF!!!   //War es diese ID?   foreach ($_POST['FrmBTT'] as $col => $val) {            echo "</table>";                  IncludeSendFomDemafair($col);            echo "<table>";       }    ?> <table border="1"/> <?php // tasble wieder starten ... da in index form so gegeben GRMPF!!!}?><form action="index.php" METHOD="post" id="form1">    </table>    <ul>        <li>            <label for="von">Datum von</label>            <input type="text" name="VON" id="datepicker" value="<?php echo date("m/d/Y","$dvon") ?>"/>            <label for="bis">Datum bis</label>            <input type="text" name="BIS" id="datepicker2" value="<?php echo date("m/d/Y","$dbis") ?>"/>            <label for="ARCHIV">bearbeitete mit anzeigen</label>            <input type="checkbox" name="ARCHIV[]" value="1" <?php echo($arc == 1) ? "checked" : ""; ?> />            <button type="submit" form="form1" name="SEITEN">Anzeigen+Ansicht temporär speichern.</button>            <label for="MITSTEUER">Mit zusätzlichen Feldern anzeigen</label>            <input type="checkbox" name="MITSTEUER[]" value="1" <?php echo($steuer == 1) ? "checked" : ""; ?> />        </li>    </ul>    <table border="1"/>    <thead>        <tr><th>Antragsart</th>            <th>Archivieren</th>            <th>Abschicken-Formular</th>            <th>Nr.</th>            <th>Datum</th>            </th><th>Vorname</th><th>Nachname</th><th>Strasse</th><th>PLZ</th><th>ORT</th>            <th>E-Mail</th><th>Tel.</th><th>Bemerkungen</th><th>BenutzerNr.</th>            <th>Datei</th>            <!-- steuerfelder -->            <?php if($steuer == 1){?>            <th>Fa.Rechtsform</th><th>Jahresgesameink.</th><th>E.Vermietung</th><th>E.Photovoltaik</th><th>Steuerbe.Rechn.</th>             <th>Bisherige GKV</th>  <th>Single/Familie</th>                 <?php }?>        </tr>    </thead>    <tbody>        <?php        // Tabelle in HTML darstellen        while ($row = mysqli_fetch_assoc($result)) {            echo "<tr>";            foreach ($row as $col => $val) {                if ($col == 'ID') {                    // einnen link zur datei machen.                    $verzeichnis = "../files/UserFiles/files_" . $val;                    // Dateilinks                    echo "<td>";                    if (is_dir($verzeichnis)) {                        $handle = opendir($verzeichnis);                        while (($datei = readdir($handle)) !== false) {                            if (filetype($verzeichnis . "/" . $datei) == 'file') {                                echo "<a class='bblinks'; href=\"index.php?file=" . $datei . "&fid=" . $val . "\">" . $datei . "</a><br>";                            }                        }                        closedir($handle);                    }                    echo "</td>";                }                else if ($col == 'ARCHIVE') {                    // archiv submitbutton                    echo "<td>";                    if ($row['ARCHIVE'] == 0) {                        echo "<button form=\"form1\" type=\"submit\" name=\"ArcBTT[".$row['ID']."]\" id=\"x\"/>Antrag ist bearbeitet.</button>";                    } else {                        echo "<p>bereits bearbeitet</p>";                    }                    echo "</td>";                    $thisid = 0;                    // wurde auf den button gedrückt?                    echo "<td>";                    if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['FrmBTT'])) {                       //War es diese ID?                       foreach ($_POST['FrmBTT'] as $col => $val) {                           if ($row['ID'] == $col){                                  $thisid = $col;                           }                       }                     }                    if ($row['ID'] <> $thisid){                        if (                        ($row['ANTRAGSART']<>'5')&&                        ($row['ANTRAGSART']<>'52')&&                        ($row['ANTRAGSART']<>'53')                        ) {                                                   // echo "<input type=\"submit\" name=\"FrmBTT[".$row['ID']."]\" id=\"showformular\" value=\"Formular Aufrufen...\"/>";                                 ?>                            <div style="display:none;">                             <?php  IncludeSendFomDemafair($row['ID']);    ?>                            </div>                            <button type="button" id="showformular<?php echo $row['ID']; ?>" value="">Form. Aufrufen...</button>                              <script>                                        $(function() {                                var dialog;                               dialog = $( "#divdarstellung<?php echo $row['ID']; ?>" ).dialog({                                  autoOpen: false,                                  height: 650,                                  width: 600,                                  modal: true                                });                                $( "#showformular<?php echo $row['ID']; ?>" ).button().on( "click", function() {                                  dialog.dialog( "open" );                                });                                                                $(".abbrechenButton<?php echo $row['ID']; ?>").button().on( "click", function() {                                  dialog.dialog( "close" );                                });                              });                                                                                                                                                      </script>                                                                                    <?php                           }                                      }                           echo "</td>";                   }                else {                    if (!($col == 'ANTRAGSART')) {                        echo "<td>" . $val . "</td>";                               }                }            }            echo "</tr>\n";        }        ?>    </tbody></form>
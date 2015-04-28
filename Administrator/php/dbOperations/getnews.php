<?php
	include('../OnlyConnection.php');
	
	$sql = "SELECT  * from SPORENET_ARTICLES_NEWS";
	
	
	$result = mysqli_query($db, $sql);
	if (!$result) {throw new Exception("Fehler im SQL-Kommando: $sql");};
	$GLOBALS["arr"]  = $result->fetch_array(MYSQLI_ASSOC);
	
?>
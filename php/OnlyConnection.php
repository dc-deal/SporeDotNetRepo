<?php
/**  TEST CONFIGURATION
 **/ 
$serv = "localhost";
$user = "root";
$pass = "";
$base = "thesporedotnetdatabase";

/**
$serv = "localhost";
$user = "root";
$pass = "";
$base = "vbinfo_userregistration";
**/
$db = mysqli_connect($serv, $user, $pass, $base);
$db->set_charset("utf8");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
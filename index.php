<?php
session_start();	
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "s,mKl2;oEG_8";

//Connect to database

$conn = mysql_connect ( $dbhost, $dbuser, $dbpass);
phpinfo();
?>

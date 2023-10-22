<?php
session_start();	
/* $dbhost = "localhost";
$dbuser = "root";
$dbpass = "1a2b3c4d";

//Connect to database
//$conn = mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
phpinfo();*/
  $conn = new mysqli("localhost", "root", "1a2b3c4d");
  if ($conn->connect_error) echo "Connection failed: " . $conn->connect_error; 
  else echo "Connected successfully";
  phpinfo();
?>

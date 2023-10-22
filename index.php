<?php
session_start();	
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "1a2b3c4d";
$conn = new mysqli($dbhost, $dbuser, $dbpass);
if ($conn->connect_error) echo "Connection failed: " . $conn->connect_error; 
else echo "Connected successfully";
phpinfo();
?>

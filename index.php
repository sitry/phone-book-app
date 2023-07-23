<?php
session_start();
$mysqli = new mysqli("localhost","root","s,mKl2;oEG_8");
die("aaa");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

	
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "s,mKl2;oEG_8";

//Connect to database

$conn = mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
?>

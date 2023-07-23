<?php
session_start();
//Database Information

$dbhost = "localhost";
$dbname = "mysql";
$dbuser = "root";
$dbpass = "n,BenAsVY6Vr";
//Connect to database
die("aaa");
$conn = mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());

mysql_select_db($dbname, $conn) or die(mysql_error());

$username = "root";
$password = "password";

  mysql_query("UPDATE mysql.user SET Password = PASSWORD('$password') WHERE User='$username'");
  echo("Thank You. Your Password has been successfully changed.");
?>

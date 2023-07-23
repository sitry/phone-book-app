<?php
session_start();
$mysqli = new mysqli("localhost","root","s,mKl2;oEG_8");
die("aaa");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>

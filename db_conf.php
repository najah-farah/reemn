<?php


					//include("db_conf.php");
$con=mysqli_connect("localhost","root","","ethics_system");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
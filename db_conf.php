<?php

$db_host = "127.0.0.1:52967";
$db_username = "root";
$db_password= "";
$db_name = "ethics_system";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die();


// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
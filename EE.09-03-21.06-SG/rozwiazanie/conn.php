<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "dane3";

$conn = mysqli_connect($server, $user, $pass, $dbname);
if(!$conn){
    die("Połączenie się nie powidoło".mysqli_error());
}

?>
<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "dane4";

$conn = mysqli_connect($server, $user, $pass, $dbname);
if(!$conn){
    die("Połączenie się nie powiodło: ". mysqli_connect_error());
}

?>
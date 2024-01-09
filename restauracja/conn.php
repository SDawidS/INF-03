<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "baza";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if(!$conn){
    die("Połączenie się nie powiodło");
}

?>
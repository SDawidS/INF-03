<?php

$server ="localhost";
$user = "root";
$pass = "";
$dbname = "forumpsy";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if(!$conn){
    die("Nie udało się połączyć z bazą");
}

?>
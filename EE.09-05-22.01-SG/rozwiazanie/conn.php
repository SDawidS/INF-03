<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "portal";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if(!$conn){
    die("Nie udało się nawiązać połączenia");
}

?>
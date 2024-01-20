<?php

$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "biuro";

$conn = @mysqli_connect($server, $user, $pwd, $dbname);

if(!$conn){
    die("Nie udało się połączyć z bazą");
}

?>
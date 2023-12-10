<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "wedkuj";

$conn = mysqli_connect($server, $user, $pass, $dbname);
if(!$conn){
    die("Polaczenie sie nie powiodlo: ".mysqli_connect_error());
}
?>

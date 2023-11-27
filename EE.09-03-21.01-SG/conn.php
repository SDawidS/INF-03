<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "egzamin";

$conn = mysqli_connect($server, $user, $pass, $dbname);

// Sprawdzenie połączenia

if(!$conn){
    die("Polaczenie sie nie powiodlo: ".mysqli_connect_error());
}

?>

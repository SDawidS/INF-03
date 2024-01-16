<?php

$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "firma";

$conn = @mysqli_connect($server, $user, $pwd, $dbname);

if(!$conn){
    die("Połączenie się niepowiodło");
}

?>
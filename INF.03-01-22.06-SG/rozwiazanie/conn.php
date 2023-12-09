<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "wedkuj";

$conn = mysqli_connect($server, $user, $pass, $dbname);
if(!$conn){
    mysqli_error($conn);
    mysqli_close($conn);
}

?>
<?php

$conn = @mysqli_connect("localhost", "root", "", "wedkowanie");

if(!$conn){
    die("Połączenie się nie powiodło");
}

if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres'])){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];

    $q = "INSERT INTO Karty_wedkarskie VALUES(NULL, \"$imie\", \"$nazwisko\", \"$adres\", \"2018-02-23\", 0);";
    mysqli_query($conn, $q);
}

mysqli_close($conn);
?>
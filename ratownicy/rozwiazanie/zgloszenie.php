<?php

$conn = @mysqli_connect("localhost", "root", "", "ratownictwo");

if(!$conn){
    die("Połączenie się nie powiodło");
}

if(isset($_POST['ratownik']) && isset($_POST['dyspozytor']) && isset($_POST['adres'])){

    $ratownik = $_POST['ratownik'];
    $dyspozytor = $_POST['dyspozytor'];
    $adres = $_POST['adres'];

    $q = "INSERT INTO zgloszenia VALUES (NULL, $ratownik, $dyspozytor, \"$adres\", 0, CURTIME());";
    mysqli_query($conn, $q);

}
mysqli_close($conn);
?>
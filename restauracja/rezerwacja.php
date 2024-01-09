<?php

include_once 'conn.php';

if(isset($_POST["data"]) && isset($_POST["ile"]) && isset($_POST["tel"]) && isset($_POST["check"])){

    $data = $_POST["data"];
    $ile = $_POST["ile"];
    $tel = $_POST["tel"];
    $check = $_POST["check"];

    echo "<p>Dodano rezerwację do bazy</p>";
    $q1 = "INSERT INTO rezerwacje VALUES(NULL,NULL, \"$data\",$ile,\"$tel\");";
    $r1 = mysqli_query($conn, $q1);

}
else{
    echo "<p>Nie podano wszystkich informacji</p>";
}

mysqli_close($conn);
?>
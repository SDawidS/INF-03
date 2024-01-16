<?php

$server = "localhost";
$user = "root";
$pwd = "";
$dbname = "wedkarstwo";

$conn = mysqli_connect($server, $user, $pwd, $dbname);

if($conn->connect_error){
    die("Nie udało się połączyć z bazą");
}
if(isset($_POST['lowisko']) && isset($_POST['data']) && isset($_POST['sedzia'])){
    if(!empty($_POST['lowisko']) && !empty($_POST['data']) && !empty($_POST['sedzia'])){

        $lowisko = $_POST['lowisko'];
        $data = $_POST['data'];
        $sedzia = $_POST['sedzia'];

        $q = "INSERT INTO zawody_wedkarskie VALUES (NULL, 0, $lowisko, '$data', '$sedzia');";

        $r = mysqli_query($conn, $q);
    }
}
mysqli_close($conn);
?>
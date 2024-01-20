<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </div>
    <div id="baner2">
        <h1>Przyloty</h1>
    </div>
    <div id="baner3">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </div>
    <div id="main">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunke</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
            
            //Skrypt 1
            $server = "localhost";
            $user = "root";
            $pwd = "";
            $dbname = "egzamin";

            $conn = @mysqli_connect($server, $user, $pwd, $dbname);

            if(!$conn){
                die("Nie udało się połączyć z bazą");
            }

            $q1 = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
            $r1 = mysqli_query($conn, $q1);
            while($row = mysqli_fetch_array($r1)){
                echo"<tr>
                <td>{$row['czas']}</td>
                <td>{$row['kierunek']}</td>
                <td>{$row['nr_rejsu']}</td>
                <td>{$row['status_lotu']}</td>
                </tr>
                ";
            }
            ?>
        </table>
    </div>
    <div id="footer1">
        <?php

        //Skrypt 2

        $cookie_name = "visit";
        $cookie_value = "visited";
        $expiry_time = time() + (60 * 60 * 2); // 2 godziny

        if(!isset($_COOKIE[$cookie_name])){
            setcookie($cookie_name, $cookie_value, $expiry_time, "/");
            echo"<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
        }
        else{
            echo"<p><i>Witaj ponownie na stronie lotniska</i></p>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div id="footer2">
        Autor: 000000000
    </div>
</body>
</html>
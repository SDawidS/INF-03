<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>BIURO TURYSTYCZNE</h1>
    </div>
    <div id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            include_once 'conn.php';
            //Skrypt 1
            $q1 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna=1;";
            $r1 = mysqli_query($conn, $q1);
            while($row = mysqli_fetch_array($r1)){
                echo" <li>{$row['id']}. dnia {$row['dataWyjazdu']} jedziemy do {$row['cel']}, cena {$row['cena']}
                </li>";
            }
            ?>
        </ul>
    </div>
    <div id="l">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </div>
    <div id="s">
        <h2>Nasze zdjęcia</h2>
        <?php

        //Skrypt 2
        $q2 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";
        $r2 = mysqli_query($conn, $q2);
        while($row = mysqli_fetch_array($r2)){
            echo"<img src=\"{$row['nazwaPliku']}\" alt=\"{$row['podpis']}\">";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div id="p">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </div>
    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>
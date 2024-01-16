<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="lewy">
        <h1>Akta pracownicze</h1>
        <?php
        include_once 'conn.php';
        //Skrypt 1
        $q1 = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id=2;";

        $r1 = mysqli_query($conn, $q1);
        $tab1 = mysqli_fetch_array($r1);
        echo"
        <h3>dane</h3>
        <p>{$tab1['imie']} {$tab1['nazwisko']}</p>
        <hr>
        <h3>adres</h3>
        <p>{$tab1['adres']}</p> 
        <p>{$tab1['miasto']}</p>
        <hr>";
        if($tab1['czyRODO'] == 1){
        echo"<p>RODO: podpisano</p>";
        }
        if($tab1['czyRODO'] == 0){
            echo"<p>RODO: niepodpisano</p>";
        }
        if($tab1['czyBadania'] == 1){
            echo"<p>Badanie: aktualne</p>";
            }
        if($tab1['czyBadania'] == 0){
            echo"<p>Badanie: nieaktualne</p>";
        }
        

        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <p>
            <?php

            // Skrypt 2
            $q2 = "SELECT COUNT(*) FROM pracownicy;";
            $r2 = mysqli_query($conn, $q2);
            $tab2 = mysqli_fetch_array($r2);
            echo"{$tab2['COUNT(*)']}";

            ?>
        </p>
    </div>
    <div id="prawy">
        <?php

        // Skrypt 3
        $q3 = "SELECT id, imie, nazwisko FROM pracownicy WHERE id=2;";
        $r3 = mysqli_query($conn, $q3);
        $tab3 = mysqli_fetch_array($r3);

        $id = $tab3['id'];

        echo"<img src=\"$id.jpg\" alt=\"pracownik\">";

        $q4 = "SELECT pracownicy.id, nazwa, opis FROM pracownicy INNER JOIN stanowiska ON stanowiska.id=pracownicy.stanowiska_id WHERE pracownicy.id=2;";
        $r4 = mysqli_query($conn, $q4);
        $tab4 = mysqli_fetch_array($r4);
        echo "<h4>{$tab4['nazwa']}</h4>
        <p>{$tab4['opis']}</p>";
        mysqli_close($conn);
        ?>
    </div>
    
    <footer>
        Autorem aplikacji jest: 0000000000
        <ul>
            <li>skontaktuj się </li>
            <li>poznaj naszą firmę</li>
        </ul>
    </footer> 
</body>
</html>
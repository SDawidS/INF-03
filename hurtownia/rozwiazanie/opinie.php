<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
  <div id="baner">
    <h1>Hurtownia spożywcza</h1>
  </div>
  <main>
    <h2>Opinie naszych klientów</h2>
    <?php

    // Skrypt 1
    $conn = @mysqli_connect("localhost", "root", "", "hurtownia");

    if(!$conn){
        die("Nie udało się połączyć z bazą");
    }

    $q1 = "SELECT zdjecie, imie, opinia FROM Klienci INNER JOIN opinie ON opinie.Klienci_id=Klienci.id WHERE Typy_id IN(2,3);";
    $r1 = mysqli_query($conn, $q1);

    while($row = mysqli_fetch_array($r1)){
        echo"<div class=\"opinia\">
        <img src=\"{$row['zdjecie']}\">
        <cite>{$row['opinia']}</cite>
        <h4>{$row['imie']}</h4>
        </div>";
    }

    ?>
  </main>
  <div id="footer1">
    <h3>Współpracują z nami</h3>
    <a href="http://sklep.pl">Sklep 1</a>
  </div>
  <div id="footer2">
    <h3>Nasi top klienci</h3>
    <ol>
        <?php

        // Skrypt 2
        $q2 = "SELECT imie, nazwisko, punkty FROM Klienci ORDER BY punkty DESC LIMIT 3;";
        $r2 = mysqli_query($conn, $q2);

        while($row = mysqli_fetch_array($r2)){
            echo"<li>{$row['imie']} {$row['nazwisko']}, {$row['punkty']} pkt.</li>";
        }
        mysqli_close($conn);
        ?>

    </ol>
  </div>
  <div id="footer3">
    <h3>Skontaktuj się</h3>
    <p>telefon: 111222333</p>
  </div>
  <div id="footer4">
    <h3>Autor: 0000000000</h3>
  </div>
</body>
</html>
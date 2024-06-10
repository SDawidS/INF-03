<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header><h1>Motocykle - moja pasja</h1></header>
    <section class="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
        <?php

        // Lista definicji skrypt 1
        $server = 'localhost';
        $user = 'root';
        $pwd = '';
        $dbname = 'motory';

        $conn = mysqli_connect($server, $user, $pwd, $dbname);

        if(!$conn){
            die("Połączenie z bazą się nie powiodło");
        }

        $sql1 = ''; //zapytanie 2
        $q1 = mysqli_query($conn, $sql1);

        while($row  = mysqli_fetch_array($q1)){
            echo "<dt>{$row['nazwa']}, rozpoczyna się w {$row['poczatek']} <a href=\"{$row['zdjecie']}\">zobacz zdjęcie</a> </dt>"; // nie wiem czy link ma być w środku dt czy na zewnątrz, z opisu zadania wynika chyba, że w środku
            echo "<dd>{$row['opis']} </dd>";
        }

        $sql2 = ''; //zapytanie 3
        $q2 = mysqli_query($conn, $sql2);

        // zapewne to jest funkcja COUNT więc będzie jeden wpis

        $row2 = mysqli_fetch_row($q2); // można podać numer kolumny, można też wykorzystać mysqli_fetch_array i dać tam nazwę

        ?>
        </dl>
    </section>
    <section class="prawy">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BWM R1200GS LC</li>
        </ol>
    </section>
    <section class="prawy">
        <h2>Statystyki</h2>
        <p>Wypisanych wycieczek: <?php echo"{$row2['0']}"?></p>
        <p>Użytkownik forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
        <?php

        mysqli_close($conn);

        ?>
    </section>
    <footer>Stronę wykonał: 0000000000</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
    </div>
    <div id="main">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php
        
        include_once 'conn.php';
        //skrypt 1

        $q1 = mysqli_query($conn, 'SELECT imie, nazwisko, opis, zdjecie FROM Osoby WHERE hobby_id IN(1,2,6);');

        

        while($r = mysqli_fetch_array($q1)){
            $imie = $r['imie'];
            $nazwisko = $r['nazwisko'];
            $zdjecie = $r['zdjecie'];
            $opis = $r['opis'];
            echo "<div class=\"img\"><img src=\"$zdjecie\" alt=\"przyjaciel\"></div>";
            echo "<div class=\"opis\"><h3>$imie $nazwisko</h3><p>Ostatni wpis: $opis</p></div>";
            echo "<div class=\"line\"><hr></div>";
        }

        mysqli_close($conn);

        ?>
    </div>
    <div class="footer">
        Stronę wykonał: 0000000000
    </div>
    <div class="footer">
        <a href="mailto:ja@portal.pl">napisz do mnie</a>
    </div>
</body>
</html>
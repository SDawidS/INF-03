<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h1>Pensjonat pod dobrym humorem</h1>
    </div>
    <div class="main">
        <a href="index.html">GŁÓWNA</a>
        <img src="1.jpg" alt="pokoje">
    </div>
    <div class="main">
        <a href="cennik.php">CENNIK</a>
        <table>
            <?php

            //Skrypt 1
            $server = "localhost";
            $user = "root";
            $pwd = "";
            $dbname = "wynajem";
            $conn = @mysqli_connect($server, $user, $pwd, $dbname);

            if(!$conn){
                die("Nie udało się połączyć z bazą");
            }
            $q = "SELECT * FROM pokoje;";
            $r = mysqli_query($conn, $q);
            while($row = mysqli_fetch_array($r)){
                echo"<tr>
                <td>{$row['id']}</td>
                <td>{$row['nazwa']}</td>
                <td>{$row['cena']}</td>
                </tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <div class="main">
        <a href="kalkulator.html">KALKULATOR</a>
        <img src="3.jpg" alt="pokoje">
    </div>
    <footer>
        <p>Stronę opracował: 000000000</p>
    </footer>
</body>
</html>
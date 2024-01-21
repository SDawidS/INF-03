<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="lb">
        <img src="logo.png" alt="meteo">
    </div>
    <div id="sb">
        <h1>Prognoza dla Wrocławia</h1>
    </div>
    <div id="pb">
        <p>maj, 2019r.</p>
    </div>
    <main>
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php

            // Skrypt 1
            $server = "localhost";
            $user = "root";
            $pwd = "";
            $dbname = "prognoza";

            $conn = @mysqli_connect($server, $user, $pwd, $dbname);

            if(!$conn){
                die("Połączenie się nie powiodło");
            }

            $q = "SELECT * FROM pogoda WHERE miasta_id=1 ORDER BY data_prognozy;";
            $r = mysqli_query($conn, $q);

            while($row = mysqli_fetch_array($r)){
                echo"<tr>
                <td>{$row['data_prognozy']}</td>
                <td>{$row['temperatura_noc']}</td>
                <td>{$row['temperatura_dzien']}</td>
                <td>{$row['opady']}</td>
                <td>{$row['cisnienie']}</td>
                </tr>";
            }
            mysqli_close($conn);

            ?>
        </table>
    </main>
    <div id="l">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </div>
    <div id="p">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner-lewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="baner-prawy">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div id="polecane" class="listy">
        <h3>Polecamy</h3>
        <?php
        include_once 'conn.php';

        // Skrypt 1

        $q1 = mysqli_query($conn, 'SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(18,22,23,25);');

        while($r = mysqli_fetch_array($q1)){
            echo "<div class=\"blokFilmu\">";
            echo "<h4>".$r['id'].". ".$r['nazwa']."</h4>";
            echo "<img src=\"".$r['zdjecie']."\" alt=\"Film\">";
            echo "<p>".$r['opis']."</p>";
            echo "</div>";
        }
        
        ?>
    </div>
    <div id="fantastyczne" class="listy">
        <h3>Filmy fantastyczne</h3>
        <?php

        // Skrypt 2

        $q2 = mysqli_query($conn, 'SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id=12;');

        while($r = mysqli_fetch_array($q2)){
            echo "<div class=\"blokFilmu\">";
            echo "<h4>".$r['id'].". ".$r['nazwa']."</h4>";
            echo "<img src=\"".$r['zdjecie']."\" alt=\"Film\">";
            echo "<p>".$r['opis']."</p>";
            echo "</div>";
        }
        ?>
    </div>
    <footer>
        <form action="video.php" method="post">
            Usuń film nr.: <input type="number" name="num" id="num">
            <input type="submit" value="Usuń film">
        <?php
        
        // Skrypt 3

        //$num = $_POST['num'];

        if(isset($_POST['num'])){
            $num = $_POST['num'];
            $q3 = mysqli_query($conn, "DELETE FROM produkty WHERE id=$num;");
        }

        
        ?>
        </form>
        Stronę wykonał: <a href="mailto:ja@poczta.com">0000000000</a>
    </footer>
</body>
</html>

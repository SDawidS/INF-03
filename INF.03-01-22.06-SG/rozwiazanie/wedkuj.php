<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php 
            include_once 'conn.php';

            $zap1 = mysqli_query($conn, 'SELECT nazwa, akwen, wojewodztwo FROM Ryby INNER JOIN Lowisko ON Lowisko.Ryby_id=Ryby.id WHERE rodzaj=3;');
            while($lista = mysqli_fetch_array($zap1)){
                echo "<li>".$lista['nazwa']." pływa w rzece ".$lista['akwen'].",".$lista['wojewodztwo']."</li>";
            }
            
            
            ?>
        </ol>
    </div>
    <div id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <br><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php 

            $zap2 = mysqli_query($conn, 'SELECT id, nazwa, wystepowanie FROM Ryby WHERE styl_zycia=1;');
            while($tabela = mysqli_fetch_array($zap2)){
                echo "<tr>";
                echo "<td>".$tabela['id']."</td>";
                echo "<td>".$tabela['nazwa']."</td>";
                echo "<td>".$tabela['wystepowanie']."</td>";
                echo "</tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>


    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gromady kręgowców</title>
    <link rel="stylesheet" href="style12.css">
</head>
<body>
    <div id="menu">
        <a href="gromada-ryby.html">gromada ryb</a>
        <a href="gromada-ptaki.html">gromada ptaków</a>
        <a href="gromada-ssaki.html">gromada ssaków</a>
    </div>
    <div id="logo">
        <h2>GROMADY KRĘGOWCÓW</h2>
    </div>
    <div id="lewy">
        <?php

        // skrypt 1

        $conn = mysqli_connect('localhost', 'root', '', 'baza');
        if(!$conn){
            die('Błąd podczas łączenia się z bazą');
        }

        $sql1 = 'SELECT id, Gromady_id, gatunek, wystepowanie FROM Zwierzeta WHERE Gromady_id IN(4,5);';
        $res1 = mysqli_query($conn, $sql1);

        while($tab = mysqli_fetch_array($res1)){
            echo"<p>{$tab['id']}. {$tab['gatunek']} </p>";
            if($tab['Gromady_id'] == 4){
                $gromada = 'ptaki';
            }
            else{
                $gromada = 'ssaki';
            }
            echo"<p>Występowanie {$tab['wystepowanie']}, gromada $gromada</p>";
            echo"<hr>";
        }

        ?>
    </div>
    <div id="prawy">
        <h1>PTAKI</h1>
        <ol> 
            <?php

            // skrypt 2

            $sql2 = 'SELECT gatunek, obraz FROM Zwierzeta WHERE Gromady_id = 4;';
            $res2 = mysqli_query($conn, $sql2);

            while($tab = mysqli_fetch_array($res2)){
                echo"<li><a href=\"{$tab['obraz']}\">{$tab['gatunek']}</a></li>";
            }
            mysqli_close($conn);
            ?>
        </ol>
        <img src="sroka.jpg" alt="Sroka zwyczajna, gromada ptaki">
    </div>
    <footer>
        <p>Stronę o kręgowcach przygotował: 0000000000</p>
    </footer>
</body>
</html>
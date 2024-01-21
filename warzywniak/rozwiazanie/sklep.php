<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner1">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div id="baner2">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/">soki</a></li>
        </ol>
    </div>
    
    <main>
        <?php

        // Skrypt 1
        $server = "localhost";
        $user = "root";
        $pwd = "";
        $dbname = "dane2";

        $conn = @mysqli_connect($server, $user, $pwd, $dbname);

        if(!$conn){
            die("Połącznie z bazą się nie powiodło");
        }

        $q = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM Produkty WHERE Rodzaje_id IN(1,2);
        ";
        $r = mysqli_query($conn, $q);

        while($row = mysqli_fetch_array($r)){
            echo" <div class=\"produkt\">
            <img src=\"{$row['zdjecie']}\" alt=\"warzywniak\">
            <h5>{$row['nazwa']}</h5>
            <p>{$row['opis']}</p>
            <p>{$row['ilosc']}</p>
            <h2>{$row['cena']} zł</h2>
            </div>";
        }
        ?>
    </main>
    <footer>
        <form action="" method="post">
            Nazwa: <input type="text" name="nazwa" id="nazwa">
            Cena: <input type="text" name="cena" id="cena">
            <input type="submit" value="Dodaj produkt">
        </form>

        <?php

        //Skrypt 2

        if(!empty($_POST['nazwa'])&&!empty($_POST['cena'])){
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];

            $q = "INSERT INTO Produkty VALUES (NULL, 1, 4, \"$nazwa\", 10, \"\", $cena, \"owoce.jpg\");";
            mysqli_query($conn, $q);
        }
        
        mysqli_close($conn);
        ?>
        Stronę wykonał: 0000000000
    </footer>
</body>
</html>
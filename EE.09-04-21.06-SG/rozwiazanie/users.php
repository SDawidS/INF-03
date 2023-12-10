<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div id="lewy">
        <h4>Użytkownicy</h4>
        <?php 
        include_once 'conn.php';
        // skrypt 1
        $rok = date("Y");
        $zap1 = mysqli_query($conn, 'SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;');
        while($w1 = mysqli_fetch_array($zap1)){
            echo $w1['id'].". ".$w1['imie']." ".$w1['nazwisko'].", ".($rok-$w1['rok_urodzenia'])." lat"."<br>";
        }
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </div>
    <div id="prawy">
        <h3>Podaj id użytkownika</h3>
        <form action="" method="post">
            <input type="number" name="number" id="number">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
        // skrypt 2
        $id = $_POST['number'];
        $zap2 = mysqli_query($conn, "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby INNER JOIN hobby ON hobby.id=osoby.hobby_id WHERE osoby.id=$id;");
        while($w2 = mysqli_fetch_array($zap2)){
        echo "<h2>".$id.". ".$w2['imie']." ".$w2['nazwisko'];
        echo "</h2>";
        echo "<img src=\"".$w2['zdjecie']."\" alt=\"".$id."\">";
        echo "<br>";
        echo "<p>Rok urodzenia ".$w2['rok_urodzenia']."</p>";
        echo "<p>Opis ".$w2['opis']."</p>";
        echo "<p>Hobby ".$w2['nazwa']."</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <footer>
        Stronę wykonał: 0000000000
    </footer>
</body>
</html>
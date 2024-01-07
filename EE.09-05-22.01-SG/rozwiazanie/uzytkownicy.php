<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <h2>Nasze osiedle</h2>
    </div>
    <div id="baner2">
        <?php
        include_once 'conn.php';
        $q1 = "SELECT COUNT(*) FROM dane;";
        $r1 = mysqli_query($conn, $q1);

        $tab = mysqli_fetch_array($r1);
        $count = $tab["COUNT(*)"];
        echo "<h5>Liczba użytkowników portalu: $count</h5>";

        ?>
    </div>
    <div id="lewy">
        <h3>Logowanie</h3>
        <form action="" method="post">
            <label for="login">login</label>
            <input type="text" name="login" id="login">
            <br>
            <label for="pass">hasło</label>
            <input type="password" name="pass" id="pass">
            <br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>
    <div id="prawy">
        <h3>Wizytówka</h3>
        <?php

        //Skrypt 2
        
        if(empty($_POST["login"])||empty($_POST["pass"])){
            echo "<p>Nie podano nic</p>";
        }
        else{
        $login = $_POST["login"];
        $pass = $_POST["pass"];

        $q2 = "SELECT login, haslo FROM uzytkownicy WHERE login=\"$login\";";
        $r2 = mysqli_query($conn, $q2);
        $tab2 = mysqli_fetch_array($r2);

        if($tab2){
            $db_login = $tab2["login"];
            $db_pass = $tab2["haslo"];
        }

        $q3 = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy INNER JOIN dane ON dane.id=uzytkownicy.id WHERE login=\"$login\";";
        $r3 = mysqli_query($conn, $q3);
        $tab3 = mysqli_fetch_array($r3);
        
        if(empty($db_login)){
            echo "<p>login nie istnieje</p>";
        }
        if($db_pass != sha1($pass)){
            echo "<p>hasło niepoprawne</p>";
        }
        if($db_pass == sha1($pass) && $tab3){
            $zdjecie = $tab3["zdjecie"];
            $rok_urodz = $tab3["rok_urodz"];
            $przyjaciol = $tab3["przyjaciol"];
            $hobby = $tab3["hobby"];
            $wiek = date('Y') - $rok_urodz;

            echo "<div class=\"card\">
            <img src=\"$zdjecie\" alt=\"osoba\">
            <h4>$login ($wiek)</h4>
            <p>hobby: $hobby</p>
            <h1><img src=\"icon-on.png\"> $przyjaciol</h1>
            <button onclick=\"window.location.href='dane.html'\">Więcej informacji</button>
            </div>";
        }
    }
        mysqli_close($conn);
        ?>
    </div>
    <footer>Stronę wykonał: 0000000000</footer>
</body>
</html>
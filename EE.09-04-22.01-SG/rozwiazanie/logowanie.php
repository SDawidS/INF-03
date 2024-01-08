<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div id="prawy1">
        <h2>Zapisz się</h2>
        <form action="" method="post">
            login: <input type="text" name="login" id="">
            <br>
            hasło: <input type="password" name="haslo1" id="">
            <br>
            powtórz hasło: <input type="password" name="haslo2" id="">
            <br>
            <input type="submit" value="Zapisz">
        </form>
        <?php
        //Skrypt 1
        include_once 'conn.php';

        if(empty($_POST["login"]||empty($_POST["haslo1"])||empty($_POST["haslo2"]))){
            echo "<p>wypełnij wszystkie pola</p>";
        }
        
        $login = $_POST["login"];
        $haslo1 = $_POST["haslo1"];
        $haslo2 = $_POST["haslo2"];

        /*
        //Metoda z modyfikowaniem zapytania sql
        $q1 = "SELECT login FROM uzytkownicy WHERE login=\"$login\";";
        $r1 = mysqli_query($conn, $q1);
        $dblogin = mysqli_fetch_array($r1);

        if($login == $dblogin["login"] && isset($login)){
            echo "<p>login wystepuje w bazie danych, konto nie zostało dodane</p>";
        }

        */

        //Metoda bez modyfikowania zapytania sql
        $q1 = "SELECT login FROM uzytkownicy;";
        $r1 = mysqli_query($conn, $q1);

        $logins = array();
        while($row = mysqli_fetch_array($r1)){
            $logins[] = $row["login"];
        }

        if(in_array($login, $logins)){
            echo "<p>login wystepuje w bazie danych, konto nie zostało dodane</p>";
        }


        if($haslo1 != $haslo2 ){
            echo "<p>hasła nie są takie same konto nie zostało dodane</p>";
        }
        if($haslo1 == $haslo2 && isset($haslo1) && isset($haslo2)){
            $haslo = sha1($haslo1);
            $q2 = "INSERT INTO uzytkownicy VALUES(NULL,\"$login\", \"$haslo\");";
            $r2 = mysqli_query($conn, $q2);
            echo "<p>Konto zostało dodane</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <div id="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <footer>
        Stronę wykonał: 0000000000
    </footer>
</body>
</html>
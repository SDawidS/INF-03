<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Forum miłośników psów</h1>
    </div>
    <div id="lewy">
        <img src="Avatar.png" alt="Użytkownik forum">
        <?php

        //Skrypt 1
        include_once 'conn.php';

        $q1 = "SELECT nick, postow, pytanie FROM konta INNER JOIN pytania ON pytania.konta_id = konta.id WHERE pytania.id = 1;";
        $r1 = mysqli_query($conn, $q1);

        while($tab = mysqli_fetch_array($r1)){
            echo "<h4>Użytkownik: {$tab["nick"]} </h4>
            <p>{$tab["postow"]} postów na forum</p>
            <p>{$tab["pytanie"]}</p>";
        }
        ?>
        <video controls loop>
            <source src="video.mp4" type="video/mp4">
            Twoja przeglądarka nie obsługuje elementu video.
        </video>
    </div>
    <div id="prawy">
        <form action="" method="post">
            <textarea name="pw" id="pw" cols="40" rows="4"></textarea>
            <br>
            <button type="submit">Dodaj odpowiedź</button>
        </form>
        <?php

        //Skrypt 2
        if(isset($_POST["pw"])){
            $pw = $_POST["pw"];
            $q2 = "INSERT INTO odpowiedzi VALUES(NULL,1,5,\"$pw\");";
            $r2 = mysqli_query($conn, $q2);
        }
        ?>

        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php

            //Skrypt 3
            $q3 = "SELECT odpowiedzi.id, odpowiedz, nick FROM odpowiedzi INNER JOIN konta ON konta.id = odpowiedzi.konta_id WHERE Pytania_id=1;";
            $r3 = mysqli_query($conn, $q3);

            while($tab = mysqli_fetch_array($r3)){
                echo "<li>{$tab["odpowiedz"]}
                <em>{$tab["nick"]}</em></li>
                <hr>
                ";
            }


            mysqli_close($conn);
            ?>
        </ol>

    </div>
    <footer>
        Autor: 000000000000
        <a href="http://mojestrony.pl" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>
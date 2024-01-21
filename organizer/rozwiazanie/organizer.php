<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <div class="baner">
        <h2>MÓJ ORGANIZER</h2>
    </div>
    <div class="baner">
        <form action="" method="post">
            Wpis wydarzenia: <input type="text" name="wpis" id="wpis">
            <input type="submit" value="ZAPISZ">
        </form>
    </div>
    <div id="baner">
        <img src="logo2.png" alt="Mój organizer">
    </div>
    <main>
        <?php
        
        $server = "localhost";
        $user = "root";
        $pwd = "";
        $dbname = "egzamin6";

        $conn = @mysqli_connect($server, $user, $pwd, $dbname);

        if(!$conn){
            die("Połącznie się nie udało");
        }

        //Skrypt 1
        if(isset($_POST['wpis'])){
            $wpis = $_POST['wpis'];
            $q = "UPDATE zadania SET wpis=\"$wpis\" WHERE dataZadania=\"2020-08-27\";";
            $r = mysqli_query($conn, $q);
        }


        $q1 = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac=\"sierpien\";";
        $r1 = mysqli_query($conn, $q1);

        while($row = mysqli_fetch_array($r1)){
            echo"<div class=\"dane\">
            <h6>{$row['dataZadania']}, {$row['miesiac']}</h6>
            <p>{$row['wpis']}</p>
            </div>";
        }
        ?>
    </main>
    <footer>
        <?php

        //Skrypt 2
        $q2 = "SELECT miesiac, rok FROM zadania WHERE dataZadania=\"2020-08-01\";";
        $r2 = mysqli_query($conn, $q2);
        $row = mysqli_fetch_array($r2);
        echo"<h2>miesiąc: {$row['miesiac']}, rok: {$row['rok']}</h2>";

        mysqli_close($conn);
        ?>
        <p>Stronę wykonał: 0000000000</p>
    </footer>
</body>
</html>
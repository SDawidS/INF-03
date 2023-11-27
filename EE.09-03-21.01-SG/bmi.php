<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>
    <div id="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>
    <div id="main">
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>Wartość minimalna</th>
                <th>Wartość maksymalna</th>
            </tr>
<?php

    include 'conn.php';
    $zap1 = mysqli_query($conn,'SELECT informacja, wart_min, wart_max FROM bmi;');
    while($tabela = mysqli_fetch_array($zap1))
    {   
        echo "<tr>";
        echo "<td>".$tabela['informacja']."</td>";
        echo "<td>".$tabela['wart_min']."</td>";
        echo "<td>".$tabela['wart_max']."</td>";
        echo "</tr>";
} 

?>
        </table>
    </div>
    <div id="left">
        <h1>Podaj wagę i wzrost</h1>
        <form action="" method="post">
            <label for="wzrost">Wzrost w cm</label>
            <input type="number" name="wzrost" id="wzrost" min="1">
            <br>
            <label for="waga">Waga</label>
            <input type="number" name="waga" id="waga" min="1">
            <br>
            <input type="submit" value="Wyślij i zapamiętaj wynik">
        </form>

<?php

    echo "Twój wzrost to: ".$_POST["wzrost"]." ";
    echo "Twoja waga to: ".$_POST["waga"]."<br>";
    if($_POST['wzrost']==""||$_POST['waga']==""){

    }
    else{
     //Dodałem tutaj od siebie funkcję round, która sprawia, że wynik jest bardziej czytelny. 
     $BMI = ROUND($_POST["waga"]/(($_POST["wzrost"]*$_POST["wzrost"])/10000),2);
    echo "BMI wynosi: ".$BMI;

    // bmi_id – wyznaczony przedział np. 3, jeśli obliczone BMI to nadwaga
    $bmi_id = 0;
    switch (true) { 
        case ($BMI <= 18): $bmi_id = 1; 
        break; 
        case ($BMI >= 19 && $BMI <= 25): $bmi_id = 2; 
        break; 
        case ($BMI >= 26 && $BMI <= 30): $bmi_id = 3;
        break; 
        case ($BMI >= 31): $bmi_id = 4; 
        break; 
    }

        //data_pomiaru – aktualna data wyznaczona funkcją PHP, w formacie Y-m-d
        $data_pomiaru = date("Y-m-d");

        // Tutaj musi być zastosowana funkcja intval(), bo w bazie mogą być tylko wartości INT
        $wynik = intval($BMI);
    
        //Tutaj wpisuję podane dane do bazy
        $sql = "INSERT INTO wynik VALUES ('NULL','$bmi_id', '$data_pomiaru', '$wynik')";
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Nie udało się wykonać kwerendy $sql. " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);

    ?>
    </div>
    <div id="right">
        <img src="rys1.png" alt="ćwiczenia">
    </div>
    <footer>
        <p>
            Autor: 0000000000
            <a rel="text/plain" href="kwerendy.txt">Zobacz kwerendy</a>
        </p>
    </footer>


</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "kalendarz");

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>



    <section id="text">
        <p>
            <?php
            
            $dzien = date("l");
            $dnitygodnia = array(
                'Monday'=>'Poniedziałek', 
                'Tuesday'=>'Wtorek', 
                'Wednesday'=>'Środa', 
                'Thursday'=>'Czwartek', 
                'Friday'=>'Piątek', 
                'Saturday'=>'Sobota', 
                'Sunday'=>'Niedziela'
            );

        
            $data1 = date("d-m-Y");


            $zapytanie1 = mysqli_query($conn, "SELECT imiona FROM `imieniny` WHERE data=DATE_FORMAT(CURRENT_DATE(), '%m-%d');");
            while ($wynik1 = mysqli_fetch_assoc($zapytanie1)){
                echo "Dzisiaj jest " . $dnitygodnia[$dzien] . ", " .  $data1 . ", imieniny: " . $wynik1["imiona"];
            }

            ?>
        </p>
    </section>
<main>
    <section id="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>paździenik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>

    <section id="srodkowy">
        <h2>Sprawdź kto ma urodziny</h2>
        <form method="POST">
            <input type="date" min="2024-01-01" max="2024-12-31" id="data" name = "data" required>
            <input type="submit" value="Wyślij">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data2 = $_POST['data']; 
                $data_mmdd = date("m-d", strtotime($data2));
                
                $zapytanie2 = mysqli_query($conn, "SELECT imiona FROM imieniny WHERE data = '$data_mmdd'");

                echo "<br> Dnia $data2 są imieniny: ";

                    while ($wynik2 = mysqli_fetch_row($zapytanie2)) {
                        echo $wynik2[0] . " ";
                    }
}
            ?>
        </form>
    </section>

    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny</li>
            <ul>
                <li>kalendarz Majów</li>
                <li>juliański</li>
                <li>gregoriański</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
        </ol>
    </section>

</main>
    <footer>
        <p>Stronę opracował(a): AG</p>
    </footer>



</body>
</html>

<?php
mysqli_close($conn);
?>
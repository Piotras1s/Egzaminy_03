<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
    <img src="motor.png" alt="motocykl" class="obrazek">
    <header>
        <h1>motocykle - moja pasja</h1>
    </header>
    <section id="lewy"><h2>gdzie pojechac?</h2>
    <dl>
        <?php 
        $goon = mysqli_connect("localhost", "root", "", "motory");
        $zapytanie = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM `wycieczki` JOIN zdjecia ON zdjecia.id = wycieczki.zdjecia_id;";
        $wynik = mysqli_query($goon, $zapytanie);
        while($row = mysqli_fetch_array($wynik)){
            echo "<dt>" . $row['nazwa'] . " - " . $row['poczatek'] . "  <a href='" . $row['zrodlo'] . ".jpg' alt='zdjecie' class='zdjecie'>Zobacz</a></dt>";
            echo "<dd>" . $row['opis']. "</dd>";
        }
    ?>
    </dl>
</section>
    <section id="prawy"><h2>co kupic?</h2>
    <ol>
        <li>Honda CBR125R</li>
        <li>Yamaha YZF-R125</li>
        <li>Honda VRF800i</li>
        <li>Honda CBR1100XX</li>
        <li>BMW R1200GS LS</li>
    </ol>
</section>
    <section id="prawy2">
        <h2>statystyki</h2>
        <p>Wpisanych wycieczek  <?php 
        $zapytanie2 = "SELECT COUNT(*) AS ilosc FROM wycieczki;";
        $wynik2 = mysqli_query($goon, $zapytanie2);
        $row2 = mysqli_fetch_array($wynik2);
        echo $row2['ilosc'];
        mysqli_close($goon);
        ?></p>
        <p>Użytkownikow forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer>Strone wykonał: Dart GOGIGNDS</footer>
</body>
</html>
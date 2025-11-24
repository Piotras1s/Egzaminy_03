<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "biuro");
?>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>

    <section id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
            $zapytanie1=mysqli_query($conn, "SELECT id, dataWyjazdu, cel, cena FROM `wycieczki` WHERE dostepna=1;");
            while($wynik1=mysqli_fetch_assoc($zapytanie1)){
                echo "<li>";
                echo $wynik1["id"] . ". dnia " . $wynik1["dataWyjazdu"] . " jedziemy do " . $wynik1["cel"] . ", cena: " . $wynik1["cena"];
                echo "</li>";
            }

            ?>
        </ul>
    </section>
<main>
    <section id="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h2>Nasze zdjęcia</h2>
        <?php
        $zapytanie2=mysqli_query($conn, "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis DESC;");
        while($wynik2=mysqli_fetch_assoc($zapytanie2)){
            echo "<img src='" . $wynik2["nazwaPliku"] . "' alt='" . $wynik2["podpis"] . "'>";
        }
        ?>
    </section>
    <section id="prawy">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </section>
</main>
    <footer>
        <p>Stronę wykonał: skibidi sigma kinga ohio skibidi gyat 67</p>
    </footer>
</body>
<?php
mysqli_close($conn);
?>
</html>
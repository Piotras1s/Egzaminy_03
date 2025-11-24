<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
    <?php
    $conn=mysqli_connect('localhost','root','','podroze');
    ?>
</head>
<body>
    <header>
<h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
   <section id='lewy'>
<h2>Promocje</h2>
<table>
    <tr>
        <td>Warszawa</td>
        <td>od 600 zł</td>
    </tr>
    <tr>
        <td>Wenecja</td>
        <td>od 1200 zł</td>
    </tr>
    <tr>
        <td>Paryż</td>
        <td>od 1200 zł</td>
    </tr>
</table>
   </section>
   <section id='srodkowy'>
<h2>W tym roku jedziemy do...</h2>
<?php
$zapytanie1=mysqli_query($conn,'SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis ASC;');
while($wynik1=mysqli_fetch_assoc($zapytanie1)){
    echo "<img src='" . $wynik1["nazwaPliku"] . "' alt='" . $wynik1["podpis"] . "' title='" . $wynik1["podpis"] ."'>";
}
?>
   </section>
    <section id='prawy'>
<h2>Kontakt</h2>
<a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
<p>telefon: 444555666</p>
    </section>
    </main>
    <section id='dane'>
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
<?php
$zapytanie2=mysqli_query($conn,"SELECT cel, dataWyjazdu FROM `wycieczki` WHERE dostepna=0;");
while($wynik2=mysqli_fetch_assoc($zapytanie2)){
    echo "<li>Dnia ". $wynik2["dataWyjazdu"] . " pojechaliśmy do " . $wynik2["cel"] . "</li>";
}
?>
        </ol>
    </section>
    <footer>
<p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
<?php
mysqli_close($conn);
?>
</html>
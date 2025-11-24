<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Medica</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="obraz2.png" type="image/x-icon">
    <?php
    $conn = mysqli_connect("localhost", "root","", "medica");
    ?>
</head>
<body>
    <header>
<h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
$zapytanie1 = mysqli_query($conn, "SELECT nazwa, cena, opis FROM `abonamenty`;");
while ($wynik1 = mysqli_fetch_assoc($zapytanie1)) {
    echo "<h3>Pakiet ". $wynik1["nazwa"]. " - cena ". $wynik1["cena"]. "zł </h3>";
    echo "<p>". $wynik1["opis"]."</p>";
}
        ?>
<a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section id="pierwsza">
            <h2>Standardowy</h2>
            <ul>
                <?php
                $zapytanie3 = mysqli_query($conn, "SELECT abonamenty.nazwa, cechy.cecha FROM `abonamenty` JOIN cechy, szczegolyabonamentu
WHERE abonamenty.id = szczegolyabonamentu.Abonamenty_id AND abonamenty.id = 1 AND szczegolyabonamentu.Cechy_id = cechy.id;");
while($wynik2 = mysqli_fetch_assoc($zapytanie3)) {
    echo "<li>". $wynik2["cecha"]. "</li>";
}
                ?>
            </ul>
        </section>
        <section id="druga">
             <h2>Premium</h2>
            <ul>
                <?php
$zapytanie4 = mysqli_query($conn, "SELECT abonamenty.nazwa, cechy.cecha FROM `abonamenty` JOIN cechy, szczegolyabonamentu
WHERE abonamenty.id = szczegolyabonamentu.Abonamenty_id AND abonamenty.id = 2 AND szczegolyabonamentu.Cechy_id = cechy.id;");
while($wynik3 = mysqli_fetch_assoc($zapytanie4)) {
    echo "<li>". $wynik3["cecha"]. "</li>";
}
                ?>
            </ul>
        </section>
        <section id="trzecia">
             <h2>Dziecko</h2>
            <ul>
                <?php
$zapytanie5 = mysqli_query($conn, "SELECT abonamenty.nazwa, cechy.cecha FROM `abonamenty` JOIN cechy, szczegolyabonamentu
WHERE abonamenty.id = szczegolyabonamentu.Abonamenty_id AND abonamenty.id = 3 AND szczegolyabonamentu.Cechy_id = cechy.id;");
while($wynik4 = mysqli_fetch_assoc($zapytanie5)) {
    echo "<li>". $wynik4["cecha"]. "</li>";
}
mysqli_close($conn);
                ?>
            </ul>
        </section>
    </main>
    <footer>
<p><img src="obraz2.png" alt="przychodnia">Stronę przygotował: new trip friday</p>
    </footer>
    
</body>
</html>
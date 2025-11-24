<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>

        <section id="lewy">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li> Miasta</li>
                <li> Przyroda</li>
                <li>Samochody</li>
            </ol>
        </section>

        <section id="srodkowy">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "galeria");
            $zapytanie2 = mysqli_query($conn, "SELECT zdjecia.plik, zdjecia.tytul, zdjecia.polubienia, autorzy.imie, autorzy.nazwisko FROM zdjecia JOIN autorzy ON zdjecia.autorzy_id=autorzy.id ORDER BY autorzy.nazwisko ASC;");
            while ($wynik2 = mysqli_fetch_assoc($zapytanie2)) {
                echo "<section id='skrypt'>";
                echo "<img src='". $wynik2["plik"]. "' alt='zdjęcie'>";
                echo "<h3>". $wynik2["tytul"]. "</h3>";
                if($wynik2["polubienia"]>40){
                    echo "<p>Autor: " .$wynik2["imie"] . $wynik2["nazwisko"] . ".<br> Wiele osób polubiło ten obraz </p>";
                }
                else{
                    echo "<p>Autor: " .$wynik2["imie"] . $wynik2["nazwisko"] . ".</p>";
                }
                echo "<a href='" .$wynik2["plik"] . "'download>Pobierz</a>";
                echo "</section>";
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php
            $zapytanie1 = mysqli_query($conn, "SELECT tytul, plik FROM `zdjecia` WHERE polubienia >=100;");
            while ($wynik1 = mysqli_fetch_assoc($zapytanie1)){
                echo "<img src='". $wynik1["plik"]. "' alt='" .$wynik1["tytul"]. "'>";
            }
            ?>
            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </section>
        <?php
        mysqli_close($conn);
        ?>
    </main>
    <footer>
        <h5>Stronę wykonał: 271 000</h5>
    </footer>
</body>
</html>
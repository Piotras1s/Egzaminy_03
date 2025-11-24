<?php
$conn = mysqli_connect('localhost', 'root','' , 'dane');
if($conn->connect_error){
     die("połaczenie nieudane" . $conn->connect_error);
}
$zapytanie = "SELECT zdjecie, imie, nazwisko, opis FROM osoby";
$ilosc = mysqli_query($conn, $zapytanie);
mysqli_close($conn);
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista przyjaciół</title>
</head>
<body>


    <header>
        <h1>Portal Społecznościowy - moje konto</h1>
    </header>


    <main>
        <section>
            <h2>Moje zainteresowania</h2>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        <h2>Moi znajomi</h2>
        </section>

        <section>
            <?php
            if ($ilosc->num_rows > 0) {
                while ($row = $ilosc->fetch_assoc()) {
                    echo '<div class="blok-zdjecie">';
                    echo '<img src="ee09-2021-czerwiec-egzamin-zawodowy-praktyczny-zalaczniki/' . $row['zdjecie'] . '" alt="przyjaciel">';
                    echo '</div>';
            
                    echo '<div class="blok-opis">';
                    echo '<h3>' . $row['imie'] . " " .  $row['nazwisko'] . '</h3>';
                    echo '<p>Ostatni wpis: ' . $row['opis'] . '</p>';
                    echo '</div>';
            
                    echo '<div class="blok-linia">';
                    echo '<hr>';
                    echo '</div>';
                }
            }else {
                echo 'brak danych do wyswietlenia';
            }
            ?>
        </section>
    </main>


    <footer>
        <section class="stopka">
            <p>Stronę wykonał: Piotr Wita</p>
        </section>
        <section class="stopka">
            <p><a href="mailto:ja@portal.pl">napisz do mnie</a></p>
        </section>
    </footer>
</body>
</html>
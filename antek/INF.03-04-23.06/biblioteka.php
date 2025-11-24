<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteka");
?>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>

    <section id="lewy">
        <h3>Polecamy dzieła autorów:</h3>
        <ol>
            <?php
                $zapytanie1=mysqli_query($conn, "SELECT imie, nazwisko FROM `autorzy` ORDER BY nazwisko ASC;");
                while ($wynik1=mysqli_fetch_assoc($zapytanie1)){
                    echo "<li>" . $wynik1["imie"] . " " . $wynik1["nazwisko"] . "</li>";
                }
            ?>
        </ol>
    </section>

    
    <section id="srodkowy">
        <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
        <a href="mailto:sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
        <img src="biblioteka.png" alt="książki">
    </section>


        <section id="prawy1">
            <h3>Dodaj czytelnika</h3>
            <form action="biblioteka.php" method="post">
                imię: 
                <input type="text" name="imie" id="imie"><br>
                nazwisko: 
                <input type="text" name="nazwisko" id="nazwisko"><br>
                symbol: 
                <input type="number" name="symbol" id="symbol"><br>
                <button type="submit" name="dodaj">DODAJ</button>
            </form>
        </section>
    

        <section id="prawy2">
            <?php
                if (isset($_POST["dodaj"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $symbol = $_POST["symbol"];
                    echo "Czytelnik " . $imie . " " . $nazwisko . " został(a) dodany do bazy danych";
                    $zapytanie2=mysqli_query($conn, "INSERT INTO `czytelnicy` (`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');");
                }
            ?>
        </section>


    <footer>
        <p>Projekt strony: bomboclat ohio skibidi rizzler 67</p>
    </footer>

<?php
mysqli_close($conn);
?>
</body>
</html>
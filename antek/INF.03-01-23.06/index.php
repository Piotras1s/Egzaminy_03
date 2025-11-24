<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "sklep");
?>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>

        <section id="lewy">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                    $zapytanie = mysqli_query($conn, "SELECT nazwa FROM `towary` WHERE promocja = 1;");
                    while($wynik=mysqli_fetch_assoc($zapytanie)){
                        echo "<li>";
                        echo $wynik["nazwa"];
                        echo "</li>";
                    }

                ?>
            </ol>
        </section>
        <section id="srodkowy">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="post">
                <select name="towar" id="towar">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                </select>
                <button type="submit" name="sprawdz">SPRAWDŹ</button>
            </form>
            <?php
            if (isset($_POST["sprawdz"])) {
                $towar = $_POST["towar"];
                $zapytanie = mysqli_query($conn, "SELECT cena FROM `towary` WHERE nazwa = '$towar';");
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<section id='skrypt'>";
                    echo "cena regularna: " . $wynik["cena"];
                    $promocja = $wynik["cena"] * 0.7;
                    echo "<br>cena w promocji 30%: " . $promocja;
                    echo "</section>";
                    
                }
            
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Kontakt</h2>
            <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
            <img src="promocja.png" alt="promocja">
        </section>


    <footer>
        <h4>Autor strony: juice & jews</h4>
    </footer>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
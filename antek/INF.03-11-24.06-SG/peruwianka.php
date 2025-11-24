<?php
$conn = mysqli_connect("localhost", "root", "", "hodowla")
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>

    </header>


    <section id="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>


        <ol>
            <?php
                $zapytanie1 = mysqli_query($conn, "SELECT rasa FROM `rasy`;");
                while ($wynik1 = mysqli_fetch_row($zapytanie1)){
                    echo "<li>" . $wynik1[0] . "</li>";
                }
            ?>
        </ol>


    </section>


    <section id="menu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </section>
    


    
    <section id="main">
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <?php
            $zapytanie2 = mysqli_query($conn, "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM `swinki` JOIN rasy WHERE rasy.id=1 AND rasy.id=swinki.rasy_id;");
            while ($wynik2 = mysqli_fetch_assoc($zapytanie2)){
                echo "<h2> Rasa: " . $wynik2["rasa"] . "</h2>";
                echo "<p> Data urodzenia: " . $wynik2["data_ur"] . "</p>";
                echo "<p> Oznaczenie miotu: " . $wynik2["miot"] . "</p>";
            }
        ?>

        <h2>Świnki w tym miocie</h2>
        <?php
            $zapytanie3 = mysqli_query($conn, "SELECT imie, cena, opis FROM `swinki` WHERE rasy_id=1;");
            while ($wynik3 = mysqli_fetch_assoc($zapytanie3)){
                echo "<h3>" . $wynik3["imie"] . " - " . $wynik3["cena"] . "zł </h3>";
                echo "<p>" . $wynik3["opis"] . "</p>";
            }

        ?>


    </section>



<footer>
    <p>Strone wykonał: master gooner 67 mango musztarda</p>

</footer>



</body>
</html>


<?php
mysqli_close($conn);

?>
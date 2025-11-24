<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla swinek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla swinek morskich - zamow swiniowe maluszki</h1>
    </header>
    <main>
    <section id="lmenu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </section>
    <section id="lglowny">
        <img src="peruwianka.jpg" alt="Świnka morska rasy Peruwianka">
       <?php
               $conn = mysqli_connect("localhost", "root", "", "hodowla");

        $sql2 = "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM `swinki` JOIN rasy ON swinki.rasy_id = rasy.id WHERE swinki.rasy_id = '1';";
        $result2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo "<h2> Rasa: " . $row2['rasa'] . "</h2>";
            echo "<p> data urodzenia: " . $row2['data_ur'] . "</p>";
            echo "<p> Oznaczenie miotu: " . $row2['miot'] . "</p>";
        }
       ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
        $sql3 = "SELECT imie, cena, opis FROM `swinki` WHERE rasy_id = '1'";
        $result3 = mysqli_query($conn, $sql3);
        while ($row3 = mysqli_fetch_assoc($result3)) {
            echo "<h3>" . $row3['imie'] ." - " . $row3['cena'] . " zł</h3>";
            echo "<p>" . $row3['opis'] . "</p>";
        }
        ?>
    </section>
    <section id="prawy">
    <h3>Poznaj wszystkie rasy swinek morskich</h3>
    <ol>
         <?php
        $sql = "SELECT rasa FROM `rasy`;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row['rasa'] . "</li>";
        }
        ?>
    </ol>
    </section>
   </main>
    <footer>
        <p>Stronę wykonał: Jan Kowalski</p>
    </footer>
</body>
</html>
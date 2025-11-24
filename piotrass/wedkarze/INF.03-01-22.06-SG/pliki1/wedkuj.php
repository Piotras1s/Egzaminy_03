<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    
    <main>
        <section id="prawy"><img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="lewy">
        <section id="l1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
                $result = mysqli_query($conn, "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM `ryby` JOIN lowisko ON lowisko.Ryby_id = ryby.id WHERE lowisko.rodzaj = 4;");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . " " . $row['wojewodztwo'] . "</li>";
                }
                ?>

            </ol>
        </section>
        <section id="l2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $result2 = mysqli_query($conn, "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia = 1;");
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr><td>" . $row2['id'] . "</td><td>" . $row2['nazwa'] . "</td><td>" . $row2['wystepowanie'] . "</td></tr>";
                }
                ?>
            </table>
        </section>
    </section>
    
    </main>
    <footer>
        <p>Stronę wykonał: Piotr Wita</p>
    </footer>
</body>
<?php
mysqli_close($conn);
?>

</html>
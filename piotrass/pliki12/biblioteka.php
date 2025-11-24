<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h2>STRONA BIBLIOTEKI SZKOLENJ WIEDZAMIN</h2>
    </header>
    <section>
        <h3>Nasze dzisiejsze propozycje</h3>
        <table>
            <tr>
                <th>Autor</th>
                <th>Tytul</th>
                <th>Katalog</th>
            </tr>
            <?php
            $conn = mysqli_connect('localhost', 'root','','biblioteka');
            $sql = 'SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['autor'] . "</td>";
                echo "<td>" . $row['tytul'] . "</td>";
                echo "<td>" . $row['kod'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <main>
        <article id="pierwszy">
            <img src="ksiazka1.png" alt="okładka ksiazki">
            <p>Według różnych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.</p>
        </article>
        <article id="drugi"><img src="ksiazka2.png" alt="okładka ksiazki">
            <p>
                Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...
            </p>
        </article>
        <article id="trzeci"><img src="ksiazka3.png" alt="okładka ksiazki">
            <p>
                Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...
            </p>
        </article>
    </main>
    <footer>strone wykonał PW</footer>
</body>

</html>
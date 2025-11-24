<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "zdobywcy");
?>

<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>

    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <main>
    <section id="lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>
    <section id="prawy">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        <form method="post">
            Nazwisko: 
            <input type="text" name="nazwisko" id="nazwisko">
            Imię: 
            <input type="text" name="imie" id="imie">
            Funkcja: 
            <select name="funkcja" id="funkcja">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>
            Email: 
            <input type="email" name="email" id="email">
            <button type="submit">Dodaj</button>
            <?php
            if (!empty($_POST["nazwisko"]) && !empty($_POST["imie"]) && !empty($_POST["funkcja"]) && !empty($_POST["email"])) {
                $nazwisko = $_POST["nazwisko"];
                $imie = $_POST["imie"];
                $funkcja = $_POST["funkcja"];
                $email = $_POST["email"];
                
                $zapytanie2 = mysqli_query($conn, "INSERT INTO `osoby`(`nazwisko`, `imie`, `funkcja`, `email`) VALUES ('$nazwisko','$imie','$funkcja','$email');");

            }

            ?>
            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imie</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>
                <?php
                    $zapytanie1 = mysqli_query($conn, "SELECT nazwisko, imie,  funkcja, email FROM `osoby`;");
                    while($wynik1=mysqli_fetch_assoc($zapytanie1)){
                        echo "<tr>";
                        echo "<td>" . $wynik1["nazwisko"] . "</td>";
                        echo "<td>" . $wynik1["imie"] . "</td>";
                        echo "<td>" . $wynik1["funkcja"] . "</td>";
                        echo "<td>" . $wynik1["email"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </form>
    </section>
    </main>
    <footer>
        <p>Stronę wykonał: spooky scary skibidi and rizzlers down ur gyat </p>
    </footer>
<?php
mysqli_close($conn);
?>
</body>
</html>
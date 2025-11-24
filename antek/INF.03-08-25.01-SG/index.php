<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<?php
$conn = mysqli_connect("localhost", "root", "", "mieszalnia");
?>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>

    <section id="formularz">
    <form action="index.php "method="post">
        Data odbioru od: 
        <input type="date" name="od" id="od">
        do: 
        <input type="date" name="do" id="do">
        <button type="submit" name="wyszukaj" id="wyszukaj">Wyszukaj</button>
    </form>
    </section>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>


            <?php

            if(isset($_POST['wyszukaj'])){
                
                $od = $_POST['od'];
                $do = $_POST['do'];
                $zapytanie2 = mysqli_query($conn, "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru FROM `klienci` JOIN zamowienia WHERE klienci.Id=zamowienia.id_klienta AND zamowienia.data_odbioru>='$od' AND zamowienia.data_odbioru<='$do' ORDER BY zamowienia.data_odbioru ASC;");

                    while($wynik=mysqli_fetch_assoc($zapytanie2)){
                        echo "<tr>";
                    echo "<td>" . $wynik["id"] . "</td>";
                    echo "<td>" . $wynik["Nazwisko"] . "</td>";
                    echo "<td>" . $wynik["Imie"] . "</td>";
                    echo "<td id=kod" . $wynik["kod_koloru"] . ">";
                    echo "<style>";
                    echo "#kod" . $wynik["kod_koloru"] . "{";
                    echo "background-color: #" . $wynik["kod_koloru"] . ";}";
                    echo "</style>";
                    echo $wynik["kod_koloru"];
                    echo "</td>";
                    echo "<td>" . $wynik["pojemnosc"] . "</td>";
                    echo "<td>" . $wynik["data_odbioru"] . "</td>";
                    echo "</tr>";
                    }
                
            } else {
                $zapytanie1 = mysqli_query($conn, "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru FROM `klienci` JOIN zamowienia WHERE klienci.Id=zamowienia.id_klienta ORDER BY zamowienia.data_odbioru ASC;");
                while($wynik1=mysqli_fetch_assoc($zapytanie1)){
                    echo "<tr>";
                    echo "<td>" . $wynik1["id"] . "</td>";
                    echo "<td>" . $wynik1["Nazwisko"] . "</td>";
                    echo "<td>" . $wynik1["Imie"] . "</td>";
                    echo "<td id=kod" . $wynik1["kod_koloru"] . ">";
                    echo "<style>";
                    echo "#kod" . $wynik1["kod_koloru"] . "{";
                    echo "background-color: #" . $wynik1["kod_koloru"] . ";}";
                    echo "</style>";
                    echo $wynik1["kod_koloru"];
                    echo "</td>";
                    echo "<td>" . $wynik1["pojemnosc"] . "</td>";
                    echo "<td>" . $wynik1["data_odbioru"] . "</td>";
                    echo "</tr>";
            }
                }
                
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: skibidi skibidi hawk tuah</p>
    </footer>
</body>
<?php
mysqli_close($conn);
?>
</html>
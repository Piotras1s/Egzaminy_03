<?php
    $conn = mysqli_connect("localhost","root","","portal"); 
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal społecznościowy</title>
        <link rel="stylesheet" href="styl5.css">
    </head>
    <body>
        <div id="baner1">
            <h2>Nasze osiedle</h2>
        </div>

        <div id="baner2">
            <?php

                $zapytanie = "SELECT COUNT(*) FROM dane;";
                $wynik = mysqli_query($conn,$zapytanie);
                while($wyswietl = $wynik -> fetch_array()) {
                    echo "<h5>Liczba użytkowników portalu: $wyswietl[0]</h5>";
                }
            ?>
        </div>
        
        <div id="lewy">
            <h3>Logowanie</h3>
            <form action="uzytkownicy.php" method="post">

            Login:<br>
            <input type="text" name="login" id="login"><br>
            Hasło:<br>
            <input type="password" name="haslo" id="haslo"><br>
            <button type="submit">Zaloguj</button><br>
            </form>
        </div>

        <div id="prawy">
            <h3>Wizytówka</h3>
            <?php
                if(isset($_POST["login"]) && isset($_POST["haslo"])) {
                    echo "<div class='wizytowka'>";
                    if(!empty($_POST["login"]) && !empty($_POST["haslo"])) {
                        $login = $_POST["login"];
                        $haslo = $_POST["haslo"];
                        $hash = sha1($haslo);

                        $zapytanie = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
                        $wynik = mysqli_query($conn,$zapytanie);

                        if($wynik->num_rows == 1) {
                            while($wyswietl = $wynik -> fetch_array()) {
                                $haslobaza = $wyswietl[0];
                            }

                            if($hash == $haslobaza) {
                                $zapytanie = "SELECT u.login, d.rok_urodz, d.przyjaciol, d.hobby, d.zdjecie FROM uzytkownicy u INNER JOIN dane d ON u.id = d.id WHERE u.login = '$login';";
                                $wynik = mysqli_query($conn,$zapytanie);

                                while($wyswietl = $wynik -> fetch_array()) {
                                    $wiek = date("Y") - $wyswietl[1];
                                    echo "<img src='$wyswietl[4]' alt='osoba'>";
                                    echo "<h4>$wyswietl[0] ($wiek)</h4>";
                                    echo "<p>hobby: $wyswietl[3]</p>";
                                    echo "<h1><img src='icon-on.png' alt='obraz serca'> $wyswietl[2]</h1>";
                                    echo "<a href='dane.html'>Więcej informacji</a>";
                                }
                            }

                            else {
                                echo "hasło nieprawidłowe";
                            }
                        }
                        else {
                            echo "login nie istnieje";
                        }
                    }
                    else {
                        echo "Uzupełnij wszystkie pola";
                    }
                    echo "</div>";
                }
            ?>
        </div>

        <footer>
            Stronę wykonał: Antoni Grzybek</a>
        </footer>
    </body>
</html>

<?php
    mysqli_close($conn);
?>
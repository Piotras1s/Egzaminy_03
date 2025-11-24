<?php
$conn = mysqli_connect("localhost", "root", "", "remonty");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main>

        <aside>
            <img src="tapeta_lewa.png" alt="usługi">
            <img src="tapeta_prawa.png" alt="usługi">
            <img src="tapeta_lewa.png" alt="usługi">
        </aside>
        <nav>
            <a href="kontakt.html">kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy </a>
        </nav>

        


    <section id="main">
        <section id="lewy">
            <h2>Dla klientów</h2>
            <form action="zlecenia.php" method="post">
                <label for="">Ilu co najmniej pracowników potrzebujesz?</label>
                <input type="number" name="liczba" id="liczba">
                <button type="submit" name="firmy">Szukaj firm</button>
            </form>
            <?php
            if(isset($_POST["firmy"])){
                if(isset($_POST["liczba"])){
                    $liczba=$_POST["liczba"];
                    $zapytanie1=mysqli_query($conn, "SELECT nazwa_firmy, liczba_pracownikow FROM `wykonawcy` WHERE liczba_pracownikow >=$liczba;");
                    while($wynik1=mysqli_fetch_assoc($zapytanie1)){
                        echo"<p>";
                        echo $wynik1["nazwa_firmy"].", ".$wynik1["liczba_pracownikow"];
                        echo " pracowników</p>";
                    }
                }
            }
            
            ?>

        </section>
        <section id="srodkowy">
            <h2>Dla wykonawców</h2>
            <form action="zlecenia.php" method="post">
                <select name="select" id="select"> 
                    <?php
                    $zapytanie2=mysqli_query($conn, "SELECT DISTINCT miasto FROM `klienci` order by miasto asc;");
                    while($wynik2=mysqli_fetch_assoc($zapytanie2)){
                        echo "<option value='" . $wynik2["miasto"] . "'>" . $wynik2["miasto"] . "</option>";
                    }
                    ?>

                </select> <br>
                <input type="radio" name="wybór" value="malowanie">  malowanie <br>
                <input type="radio" name="wybór" value="gipsowanie">  gipsowanie <br>
                <button type="submit" name="klienci">Szukaj klientów</button>
             </form>
             <ul>
                <?php 
                if(isset($_POST["klienci"])){
                if(isset($_POST["select"]) && isset($_POST["wybór"])){
                $miasto=$_POST["select"];
                $rodzaj=$_POST["wybór"];
                $zapytanie3=mysqli_query($conn,"SELECT klienci.imie, zlecenia.cena FROM `klienci` JOIN zlecenia WHERE klienci.miasto='$miasto' AND zlecenia.rodzaj='$rodzaj' AND klienci.id_klienta=zlecenia.id_klienta;");
                while($wynik3=mysqli_fetch_assoc($zapytanie3)){
                    echo "<li>";
                    echo $wynik3["imie"]." - ".$wynik3["cena"];
                    echo "</li>";
                }
            }
        }
                ?>
            </ul>
        </section>
        </section>
    </section>
        
    </main>
    <footer>
        <p><strong>Stronę wykonał: Piotr Lubeńczuk</strong></p>

    </footer>

    
</body>
</html>
<?php
mysqli_close($conn);
?>
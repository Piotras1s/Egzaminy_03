<?php
$conn= mysqli_connect("localhost", "root", "", "rzeki");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoziomRzek</title>
    <link rel="stylesheet" href="styl.css">
    
</head>
<body>
    <header> 
        <section id="hlewy">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>
        <section id="hprawy">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>
    <section id="menu">
        <form action="poziomRzek.php" method="POST">
            <input type="radio" name="radia" value="r1"><label class="c1">Wszystkie</label>
            <input type="radio" name="radia" value="r2"><label class="c1">Ponad stan ostrzegawczy</label> 
            <input type="radio" name="radia" value="r3"><label class="c1">Ponad stan alarmowy</label>  
            <button type="submit" name="wyslij">Pokaż</button>
        </form>

    </section>
    <main>
        <section id="lewy">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <?php
               if (isset($_POST["wyslij"])) {
               $radia = $_POST["radia"];

               if($radia="r1"){
                $zapytanie2 = mysqli_query($conn, "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody from wodowskazy JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id where dataPomiaru = '2022-05-05';");
                while($wynik1=mysqli_fetch_assoc($zapytanie2)){
                    echo "<tr>";
                    echo "<td>".$wynik1['nazwa']."</td>";
                    echo "<td>".$wynik1['rzeka']."</td>";
                    echo "<td>".$wynik1['stanOstrzegawczy']."</td>";
                    echo "<td>".$wynik1['stanAlarmowy']."</td>";
                    echo "<td>".$wynik1['stanWody']."</td>";
                    echo "</tr>";
                }
                }
                  if($radia="r2"){
                $zapytanie3 = mysqli_query($conn, "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody from wodowskazy JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id where dataPomiaru = '2022-05-05' AND pomiary.stanWody>wodowskazy.stanOstrzegawczy;");
                while($wynik2=mysqli_fetch_assoc($zapytanie3)){
                    echo "<tr>";
                    echo "<td>".$wynik2['nazwa']."</td>";
                    echo "<td>".$wynik2['rzeka']."</td>";
                    echo "<td>".$wynik2['stanOstrzegawczy']."</td>";
                    echo "<td>".$wynik2['stanAlarmowy']."</td>";
                    echo "<td>".$wynik2['stanWody']."</td>";
                    echo "</tr>";
                }
                }
            }
               ?>
            </table>

        </section>
         <section id="prawy">
            <h3>Informacje</h3>
            <ul>
                <li>Brak  ostrzeżeń  o  burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
                
            </ul>
            <h3>Średnie stany wód</h3>
            <?php

            ?>
            <a href="http://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="rzeka">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Piotr Lubeńczuk</p>
    </footer>
</body>
</html>
<?php
mysqli_close($conn);
?>
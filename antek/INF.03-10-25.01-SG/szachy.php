<?php
$conn = mysqli_connect("localhost", "root", "", "szachy");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Koło szachowe <em>gambit piona</em></h2>
</header>

<main>
    <section id="lewy">
    <h4>Polecane linki</h4>
    <ul>
    <li><a href="kw1.png">kwerenda1</a></li>
    <li><a href="kw2.png">kwerenda2</a></li>
    <li><a href="kw3.png">kwerenda3</a></li>
    <li><a href="kw4.png">kwerenda4</a></li>
    </ul>
    <img src="logo.png" alt="Logo koła">
    </section>
    <section id="prawy">
<h3>Najlepsi gracze naszego koła</h3>



<table>
<tr>
    <th>Pozycja</th>
    <th>Pseudonim</th>
    <th>Tytuł</th>
    <th>Ranking</th>
    <th>Klasa</th>
</tr>
<?php
$zapytanie1 = mysqli_query($conn, "SELECT `pseudonim`, `tytul`, `ranking`, `klasa` FROM `zawodnicy` WHERE ranking>2787 ORDER BY ranking DESC;");
$wynik = $conn->query($zapytanie1);
$i = 0;
while ($row = $wynik->fetch_assoc()) {
    $i++;
    echo"<tr>";
    echo"<td>". $i ,"</td>";
    echo"<td>". $row["pseudonim"]," </td>";
    echo"<td>". $row["tytul"]," </td>";
    echo"<td>". $row["ranking"]," </td>";
    echo"<td>". $row["klasa"]," </td>";
    echo"</tr>";
}

    
    
?>
</table>




<form action="">
<button type="button">Losuj nową parę graczy</button>
<?php


?>


<p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>



</form>


    </section>
</main>
    <footer>
        <p>Stronę wykonał: AG</p>


    </footer>
</body>
</html>
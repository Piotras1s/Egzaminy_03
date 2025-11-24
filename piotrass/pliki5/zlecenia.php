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
    <nav>
      <a href="kontakt.html">Kontakt</a>
      <a href="http://remonty.pl">Partnerzy</a>
    </nav>

    <section id="all">
      <section id="lewy">
        <h2>Dla klientów</h2>
        <form action="zlecenia.php" method="post">
          Ilu co najmniej pracowników potrzebujesz?<br>
          <input type="number" name="pracownicy" min="1" max="100"><br>
          <button type="submit">Szukaj firm</button>
        </form>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'remonty');
        if (isset($_POST['pracownicy'])) {
          $liczba_pracownikow = $_POST['pracownicy'];
          $sql = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= $liczba_pracownikow;";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<p>'.$row['nazwa_firmy'].'</p>';
            echo '<p>'.$row['liczba_pracownikow'].' pracowników</p>';
          }
        }
        ?>
      </section>

      <section id="srodkowy">
        <h2>Dla wykonawców</h2>
        <form action="zlecenia.php" method="post">
          <select name="rodzaj" id="rodzaj">
            <?php
            $sql2 = 'SELECT DISTINCT miasto FROM klienci ORDER BY miasto ASC;';
            $result2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
              echo '<option value="'.$row2['miasto'].'">'.$row2['miasto'].'</option>';
            }
            ?>
          </select>
          <input type="radio" name="rodzaj_pracy" value="malowanie" checked> Malowanie<br>
          <input type="radio" name="rodzaj_pracy" value="gipsowanie"> Gipsowanie<br>
          <button type="submit">Szukaj klientów</button>
        </form>

        <ul>
          <?php
          if (isset($_POST['rodzaj']) && isset($_POST['rodzaj_pracy'])) {
            $sql3 = "SELECT zlecenia.cena, klienci.imie 
                     FROM zlecenia 
                     JOIN klienci ON zlecenia.id_klienta = klienci.id_klienta 
                     WHERE klienci.miasto = '".$_POST['rodzaj']."' 
                     AND zlecenia.rodzaj = '".$_POST['rodzaj_pracy']."';";
            $result3 = mysqli_query($conn, $sql3);
            while ($row3 = mysqli_fetch_assoc($result3)) {
              echo '<li>'.$row3['imie'].' - '.$row3['cena'].' PLN</li>';
            }
          }
          ?>
        </ul>
      </section>

      <section id="boczny">
        <img src="tapeta_lewa.png" alt="usługi">
        <img src="tapeta_prawa.png" alt="usługi">
        <img src="tapeta_lewa.png" alt="usługi">
      </section>
    </section>
  </main>

  <footer>
    <p><strong>Stronę wykonał: nonon</strong></p>
  </footer>
</body>
</html>

<?php
$conn = mysqli_connect('localhost', 'root', '','psy');
$zapytanie = "SELECT login FROM uzytkownicy;";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<header>
<h1>Forum wielbicieli psów</h1>
</header>


<main>
<section class="lewy"><img src="obraz.jpg" alt="foksterier"></section>
<section class="prawy">
    <div class="gora"><h2>zapisz sie</h2><br>  
    <Form action="logowanie.php" method="POST">
    login: <input type="text" name="login" id="login"><br>
    haslo: <input type="password" name="password" id="password"><br>
    powtorz haslo: <input type="password" name="rpassword" id="rpassword"><br>
    <input type="submit" value='zapisz'>Zapisz
    </Form>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $rpaswoord = $_POST["rpassword"];
        if (empty($login) || empty($password) || empty($rpaswoord)) {
            echo "<p>wypełnij wszystkie pola</p>";
        }else {
            $sql_check = "SELECT * FROM uzytkownicy WHERE login = ?";
            $stmt = $conn->prepare($sql_check);
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
            }elseif ($password !== $rpaswoord) {
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";}
                else {
                    // Szyfrowanie hasła za pomocą SHA-1
                    $hashed_password = sha1($password);
        
                    // Zapytanie do dodania nowego użytkownika do bazy
                    $sql_insert = "INSERT INTO uzytkownicy (login, haslo) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql_insert);
                    $stmt->bind_param("ss", $login, $hashed_password);
                    $stmt->execute();
        
                    echo "<p>Konto zostało dodane</p>";
        }
    }}
    ?>
</div>
    <div class="dol"><h2>Zapraszamy wszystkich</h2>
    <ol>
        <li>właścicieli psów</li>
        <li>weterynarzy</li>
        <li>tych, co chcą kupić psa</li>
        <li>tych, co lubią psy</li>
    </ol>
    <href="regulamin.html">
</div>
</section>
</main>


<Footer>
Stronę wykonał:00000000000
</Footer>
</html>
<?php
mysqli_close($conn) 
?>
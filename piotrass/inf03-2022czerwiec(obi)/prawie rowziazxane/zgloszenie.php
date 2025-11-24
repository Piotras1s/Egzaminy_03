<?php
echo '<pre>';
print_r($_POST);  // Wyświetlenie wszystkich danych przesyłanych w formularzu
echo '</pre>';
$conn = mysqli_connect('localhost', 'root', '', 'wedkarstwo');
$lowisko = $_POST['lowisko'];
$data = $_POST['data'];
$sedzia = $_POST['sedzia'];
$zapytanie = "INSERT INTO zawody_wedkarskie(zawody_wedkarskie.Karty_wedkarskie_id, zawody_wedkarskie.Lowisko_id, zawody_wedkarskie.data_zawodow, zawody_wedkarskie.sedzia)
VALUES(0, '$lowisko', '$data', '$sedzia');";
mysqli_query($conn, $zapytanie);
mysqli_close($conn);
?>
<?php
include_once '4D_polaczenie_z_baza_danych.php';
if (isset($_POST['submit'])) {
    echo (mysqli_query($conn, "INSERT INTO uczen(id, imie, nazwisko, id_klasy) VALUES('{$_POST['id']}', '{$_POST['imie']}', '{$_POST['nazwisko']}', '{$_POST['id_klasy']}')")) ? "Nowy rekord został dodany pomyślnie" : "ERROR: " . mysqli_error($conn);}
mysqli_close($conn);
?>
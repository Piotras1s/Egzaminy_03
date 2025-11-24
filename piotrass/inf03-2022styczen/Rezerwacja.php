<?php
$conn = mysqli_connect('localhost', 'root', '', 'baza');
$zapytanie = 'INSERT INTO rezerwacja(data_rez, liczba_osob, telefon) VALUES()';
mysqli_query($conn, $zapytanie);


mysqli_close($conn);
?>
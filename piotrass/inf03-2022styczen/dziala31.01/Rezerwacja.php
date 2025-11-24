<?php


$db = mysqli_connect("localhost", "root", "", "baza");

$date = $_POST['data'];
$Count= $_POST['liczba_osob'];
$telefon= $_POST['nr_telefonu'];

$q = "INSERT INTO rezerwacje (nr_stolika, data_rez, liczba_osob, telefon) 
            VALUES ( '1', '$date', '$Count', '$telefon');";
echo "Dodano rezerwację do bazy";

$result = mysqli_query($db,$q);

mysqli_close($db);
?>
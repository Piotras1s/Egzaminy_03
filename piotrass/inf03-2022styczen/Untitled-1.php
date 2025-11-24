<?php
$servername='localhost';
$username='root';
$password='';
$dbname='dziennik';
$conn=mysqli_connect($servername, $username, $password, "$dbname");
(!$conn) ?? die("nie mozna otworzyc bazy danych:" .mysqli_error())

?>
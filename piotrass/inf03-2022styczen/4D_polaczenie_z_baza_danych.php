<?php
$conn=mysqli_connect('localhost', 'root', '', 'dziennik');
(!$conn) ?? die("nie mozna otworzyc bazy danych:" .mysqli_error())
?>
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tle1infopagina';

$connection = mysqli_connect($host, $user, $password, $dbname);

if (!$connection) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

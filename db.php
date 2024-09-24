<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'donaties';


$connection = mysqli_connect($host, $user, $pass, $dbname);


if (!$connection) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

<?php
$host = 'localhost';
$user = '1078387';
$password = 'haefoowe';
$dbname = '1078387';

$connection = mysqli_connect($host, $user, $password, $dbname);

if (!$connection) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

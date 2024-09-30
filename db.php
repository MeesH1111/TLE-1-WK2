<?php
$host = 'localhost';
$user = '1078387';
$pass = 'haefoowe';
$dbname = '1078387';


$connection = mysqli_connect($host, $user, $pass, $dbname);


if (!$connection) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

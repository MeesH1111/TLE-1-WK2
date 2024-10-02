<?php
require "../TLE-1-WK2/briefdb.php";

$message = "";
$message2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = ($_POST['first_name']);
    $lastname = ($_POST['last_name']);
    $email = ($_POST['email']);


    $errors = [];

    if (empty($errors)) {
        $check_sql = "SELECT * FROM subscriber WHERE email = '$email'";
        $result = mysqli_query($connection, $check_sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Dit emailadres is al ingeschreven.";
        } else {
            $sql = "INSERT INTO subscriber (first_name, last_name, email) VALUES ('$firstname', '$lastname', '$email')";

            if (!mysqli_query($connection, $sql)) {
                die("Fout bij invoegen: " . mysqli_error($connection));
            }

            $message = "Bedankt voor je aanmelding, $firstname $lastname.";
            $message2 = " Geniet van onze nieuwsbrief!";
        }
    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nbaction.css">
</head>

<body>
    <nav>

        <div class="nav-text">
            <a class=navlink href="./info.php">Info</a>
        </div>

        <div class="nav-text">
            <a class=navlink href="./login.php">Login</a>
        </div>

        <div class="nav-logo">
            <a class=navlink href="./info.php">
                <img src="img/LogoB.png" alt="logo" class="picture">
            </a>
        </div>

        <div class="nav-text">
            <a class=navlink href="./docs/index.html">Game</a>
        </div>

        <div class="nav-text">
            <a class=navlink href="./doneren.php">Doneren</a>
        </div>
    </nav>
    <header>
        <H1><?= $message ?></H1>
    </header>
    <main>
        <div class="pipes-text">
            <h2><?= $message2 ?></h2>
            <a href="./info.php" class="main-link">Home</a>
        </div>
    </main>


    <footer>
        <div class="footer">
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
            <a href="#">Facebook</a>
            <a href="#">Contact</a>
        </div>

        <div class="footer-logo">
            <div>
                <img src="img/LogoB.png" alt="logo" class="picture">
            </div>
        </div>

        <div class="footer">
            <a href="#">Privacyverklaring</a>
            <a href="#">Algemene voorwaarden</a>
            <a href="#">Cookiebeleid</a>
        </div>

    </footer>
</body>

</html>
<?php
require "../TLE-1-WK2/briefdb.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $firstname = mysqli_real_escape_string($connection, $_POST['first_name']);
    $lastname = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $check_sql = "SELECT * FROM subscriber WHERE email = '$email'";
    $result = mysqli_query($connection, $check_sql);


    if (mysqli_num_rows($result) > 0) {
        echo "Dit emailadres is al ingeschreven.";
    } else {
        $sql = "INSERT INTO subscriber (first_name, last_name, email) VALUES ('$firstname', '$lastname', '$email')";

        if (!mysqli_query($connection, $sql)) {
            die("Fout bij invoegen: " . mysqli_error($connection));
        }

        header('Location: nieuwsbrief.php');
        exit();
    }
}

$sql = "SELECT first_name, last_name, email FROM subscriber";
$result_subscriber = mysqli_query($connection, $sql);

mysqli_close($connection)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nb.css">
</head>

<body>
    <nav>
        
    <div class="nav-text">
            <a class=navlink href="./register.php">Register</a>
        </div>

        <div class="nav-text">
            <a class=navlink href="./login.php">Login</a>
        </div>

        <div class="nav-logo">
            <img src="img/LogoB.png" alt="logo" class="picture">
        </div>

        <div class="nav-text">
            <a class=navlink href="./game.html">Game</a>
        </div>

        <div class="nav-text">
            <a class=navlink href="./doneren.php">Doneren</a>
        </div>
    </nav>
    <header>
        <H1>Inschrijving Nieuwsbrief</H1>
    </header>
    <main>
        <div class="form">
            <form action="nieuwsbriefaction.php" method="POST">
                <div class="formfield">
                    <div class="label">
                        <label for="firstname">Voornaam</label>
                    </div>
                    <input type="text" id="firstname" name="first_name" required>
                </div>
                <div class="formfield">
                    <div class="label">
                        <label for="lastname">Achternaam</label>
                    </div>
                    <input type="text" id="lastname" name="last_name" required>
                </div>
                <div class="formfield">
                    <div class="label">
                        <label for="email">Email</label>
                    </div>
                    <input type="email" id="email" name="email" required>
                </div>
                <input type="submit" value="Submit">

            </form>
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
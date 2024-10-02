<?php

if (isset($_POST['submit'])) {

    /** @var mysqli $db */
    require "../TLE-1-WK2/dblogin.php";

    // Get form data
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Server-side validation
    $errors = [];
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    if ($email == "") {
        $errors['email'] = "Enter your email";
    }
    if ($password == "") {
        $errors['password'] = "Enter your password";
    }

    // If data valid
    if (empty($errors)) {

        // create a secure password, with the PHP function password_hash()
        // $password = password_hash($password, PASSWORD_DEFAULT);

        // store the new user in the database.
        $query = "INSERT INTO users(email, password)
VALUES ('$email','$password')";

        $result = mysqli_query($connection, $query);
        // If query succeeded
        if ($result) {

            // Redirect to login page
            header('location: login.php');
            exit;
        } else {
            $errors['db'] = mysqli_error($connection);
        }
        // Exit the code
        mysqli_close($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/nb.css">
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
        <H1>Register</H1>
    </header>

    <main>
        <div class="form">
            <form action="register.php" method="POST">
                <div class="formfield">
                    <div class="label">
                        <label for="email">Email</label>
                    </div>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="formfield">
                    <div class="label">
                        <label for="password">Password</label>
                    </div>
                    <input type="text" id="password" name="password" required>

                </div>

                <input type="submit" name="submit" value="Submit">


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
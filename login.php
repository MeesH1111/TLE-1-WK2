<?php

$login = false;
// kijken of user al is ingelogd

// data ophalen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "../TLE-1-WK2/dblogin.php";

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // checken of er iets is ingevuld
    $errors = [];
    if ($email == "") {
        $errors['email'] = "Enter your email";
    }
    if ($password == "") {
        $errors['password'] = "Enter your password";
    }
    

    if (empty($errors)) {

        $query = "SELECT * FROM users WHERE `email` = '$email' ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            
            $user = mysqli_fetch_assoc($result);

            if ($password == $user['password']) {
                header('Location: info.php');
            }  else {
                //error incorrect log in
                $errors['loginFailed'] = "You failed to login";
                    print_r($errors);
            }
        }
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
            <a href="./doneren.php">Donaties</a>
        </div>

        <div class="nav-logo">
            <img src="img/LogoB.png" alt="logo" class="picture">
        </div>

        <div class="nav-text">
            <a href="./game.html">Game</a>
        </div>
    </nav>
    <header>
        <H1>Login</H1>
    </header>
    <main>
        <div class="form">
            <form action="" method="POST">
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

<?php

$login = false;
// kijken of user al is ingelogd

require "../TLE-1-WK2/dblogin.php";

// data ophalen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emial = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

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

            // Get user data from result
            $user = mysqli_fetch_assoc($result);
            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $user['password'])) {

                // Store the user in the session
                $_SESSION['login'] = true;
                // Redirect to secure page
                $login = true;

                // Credentials not valid
            } else {
                //error incorrect log in
                $errors['loginFailed'] = "You failed to login";

            }
            // User doesn't exist
        } else {
            //error incorrect log in
            $errors['loginFailed'] = "You failed to login";
        }
        mysqli_close($db);
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
            <form action="inlogaction.php" method="POST">
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

<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Log in</title>
</head>
<body>
<section class="section">
    <div class="container content">
        <a href="register.php" class="button is-link mt">Register</a>
        <h2 class="title">Log in</h2>
        <?php if ($login) { ?>
            <p>Je bent ingelogd!</p>
            <p><a href="logout.php">Uitloggen</a> / <a href="index.php">Naar book collection</a></p>
        <?php } else { ?>

        <section class="columns">
            <form class="column is-6" action="" method="post">

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="email">Email</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="email" type="text" name="email" value="<?= $email ?? '' ?>" />
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['email'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="password">Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control has-icons-left">
                                <input class="input" id="password" type="password" name="password"/>
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                                <?php if(isset($errors['loginFailed'])) { ?>
                                    <div class="notification is-danger">
                                        <button class="delete"></button>
                                        <?=$errors['loginFailed']?>
                                    </div>
                                <?php } ?>

                            </div>
                            <p class="help is-danger">
                                <?= $errors['password'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit" href=''>Log in</button>
                    </div>
                </div>
                <div class="field-label is-normal"></div>

    </div>
    </form>
</section>

<?php } ?>

</div>
</section>
</body>
</html> -->

<?php
// required when working with sessions
session_start();

$login = false;
// Is user logged in?

/** @var mysqli $db */
require "../TLE-1-WK2/dblogin.php";

if (isset($_POST['submit'])) {

    // Get form data
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    // Server-side validation
    $errors = [];
    if ($email == "") {
        $errors['email'] = "Enter your email";
    }
    if ($password == "") {
        $errors['password'] = "Enter your password";
    }

    // If data valid
    if (empty($errors)) {

        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE `email` = '$email' ";
        $result = mysqli_query($db,$query);
        // check if the user exists\
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
<!doctype html>
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
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Log in</button>
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
</html>

<?php
require "../TLE-1-WK2/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = mysqli_real_escape_string($connection, $_POST['name']);
    $bedrag = mysqli_real_escape_string($connection, $_POST['donation']);

    $sql = "INSERT INTO donaties (naam, bedrag) VALUES ('$naam', '$bedrag')";

    if (!mysqli_query($connection, $sql)) {
        die("Fout bij het invoegen: " . mysqli_error($connection));
    }

    header('Location: doneren.php');
    exit();
}

$sql = "SELECT SUM(bedrag) AS totaal_bedrag FROM donaties";
$result = mysqli_query($connection, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totaal_bedrag = $row['totaal_bedrag'] ?? 0;
} else {
    $totaal_bedrag = 0;
}

$sql = "SELECT naam, bedrag FROM donaties ORDER BY bedrag DESC";
$result_donaties = mysqli_query($connection, $sql);

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
    <title>Donaties</title>
    <link rel="stylesheet" href="css/doneren.css">
    <audio id="animationSound" src="cashier-quotka-chingquot-sound-effect-129698.mp3" preload="auto"></audio>
</head>

<body id=animatedbody>
    <nav>

        <div class="nav-text">
            <a class=navlink href="./info.php">Info</a>
        </div>

        <div class="nav-logo">
            <img src="img/LogoB.png" alt="logo" class="picture">
        </div>

        <div class="nav-text">
            <a class=navlink href="./game.html">Game</a>
        </div>
    </nav>

    <div id="animation-container"></div>
    <div id="animation-container2"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var animationContainer = document.getElementById('animation-container');
            var animationContainer2 = document.getElementById('animation-container2');
            var animationContainer3 = document.getElementById('animation-container3');
            var animationSound = document.getElementById('animationSound');

            var animation = lottie.loadAnimation({
                container: animationContainer,
                renderer: 'svg',
                loop: false,
                autoplay: false,
                path: 'Animation - 1727257181574.json'
            });

            var animation2 = lottie.loadAnimation({
                container: animationContainer2,
                renderer: 'svg',
                loop: false,
                autoplay: false,
                path: 'Animation - 1727686202109.json'
            });

            var animation3 = lottie.loadAnimation({
                container: animationContainer3,
                renderer: 'svg',
                loop: false,
                autoplay: false,
                path: 'Animation - 1727688021743.json'
            });


            if (sessionStorage.getItem('playAnimation') === 'true') {
                animationContainer.style.display = 'block';
                animationContainer2.style.display = 'block';
                animationContainer3.style.display = 'block';
                animation.play();
                animation2.play();
                animation3.play();
                animationSound.play();
                sessionStorage.removeItem('playAnimation');
            }

            document.getElementById('thebutton').addEventListener('click', function() {
                if (document.querySelector('form').checkValidity()) {
                    sessionStorage.setItem('playAnimation', 'true');
                }
            });
        });
    </script>


    <main>
        <div class=pagediv>
            <div class=divide1>
                <H1>Hier kunt u doneren aan Tuvalu</H1>

                <form action="" method="POST">
                    <div class=formdiv>
                        <div class=inputdiv>
                            <label for="name">Uw naam</label>
                            <input type="text" id="name" name="name" placeholder="Naam" required maxlength="20">
                        </div>
                        <div class=inputdiv>
                            <label for="donation">Uw donatie</label>
                            <input type="number" id="donation" name="donation" placeholder="€..." required min="0" max="9999" step="0.01">
                        </div>

                        <button id=thebutton type="submit">Doneer</button>
                    </div>
                </form>
            </div>

            <div class=divide2>

                <H1>Totaal gedoneerd bedrag</H1>
                <div id="animation-container3"></div>
                <img class=hartje src="img\heartborder.png" hartje" width="100%">
                <p class=hearttext>€ <?php echo number_format($totaal_bedrag, 2); ?></p>

            </div>
        </div>
        <div>
            <H1>Dank voor al uw gulle donaties!</H1>
        </div>

        <div>
            <table>
                <tr>
                    <th>Titel</th>
                    <th>Naam</th>
                    <th>Bedrag</th>
                </tr>
                <?php if ($result_donaties): ?>
                    <?php while ($row = mysqli_fetch_assoc($result_donaties)): ?>
                        <?php
                        $class = '';
                        if ($row['bedrag'] >= 100) {
                            $tier = 'Eilandredder';
                            $class = 'high-donation';
                        } elseif ($row['bedrag'] >= 50) {
                            $tier = 'Klimaat Advocaat';
                            $class = 'medium-donation';
                        } else {
                            $tier = 'Milieu Maatje';
                            $class = 'low-donation';
                        }
                        ?>
                        <tr class="<?php echo $class; ?>">
                            <td>
                                <img src="img/reward(<?php echo $tier; ?>).png" alt="Icoon" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;">
                                <?php echo $tier; ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['naam']); ?></td>
                            <td>€ <?php echo number_format((float)$row['bedrag'], 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Geen donaties gevonden.</td>
                    </tr>
                <?php endif; ?>
            </table>
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
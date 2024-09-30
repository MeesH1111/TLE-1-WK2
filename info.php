<?php
  $quotes = [
    "Samen kunnen we het tij keren.",
    "Kleine acties maken een groot verschil.",
    "De toekomst van Tuvalu begint vandaag.",
    "Elke druppel telt.",
    "Hoop stijgt hoger dan de zee.",
    "Bescherm het eiland, bescherm de toekomst.",
    "We kunnen leren de golven te beheersen.",
    "Handel nu, voordat het te laat is."
];


    $willekeurigeQuote = $quotes[array_rand($quotes)];
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>informatie-pagina</title>
    <link rel="stylesheet" href="css-home/home.css">
</head>

<body>

    <nav>

        <div class="nav-text">
            <a class=navlink href="./doneren.php">Donaties</a>
        </div>

        <div class="nav-logo">
            <img src="img/LogoB.png" alt="logo" class="picture">
        </div>

        <div class="nav-text">
            <a class=navlink href="./game.html">Game</a>
        </div>
    </nav>

    <header class="header-home">
        <span class="arrow left" id="prev">←</span>
        <span class="arrow right" id="next">→</span>
        <h1 id="headline"> ZuiverBuis </h1>
        <h2><?php echo $willekeurigeQuote; ?></h2>
    </header>

    <script>
        const imgBackgound = [
            'img/background1.jpg',
            'img/background2.jpg',
            'img/background3.jpg',
            'img/background4.jpg',
            'img/background5.jpg',
            'img/background6.jpg'
        ]

        let currentIndex = Math.floor(Math.random() * imgBackgound.length);
        const header = document.querySelector('.header-home');


        function changeBackground(index) {
            header.style.backgroundImage = `url(${imgBackgound[index]})`;
            console.log('Huidige afbeelding:', imgBackgound[index]);
        }

        changeBackground(currentIndex);

        setInterval(() => {
            currentIndex = (currentIndex + 1) % imgBackgound.length;
            changeBackground(currentIndex);
        }, 5000);

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % imgBackgound.length;
            changeBackground(currentIndex);
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + imgBackgound.length) % imgBackgound.length;
            changeBackground(currentIndex);
        });

    </script>


    <main class="main-home">
        <section id="main">
            <img src="img/zuiverbuis.jpg" alt="pipes">
            <div class="pipes-text">
                <div>
                    <p class="title">Help om Tuvalu te redden</p>
                    <p>Wij werken samen aan een belangrijk project om Tuvalu te redden dat bedreigd wordt door de
                        stijgende zeespiegel. Als groep hebben we besloten een innovatief systeem te ontwikkelen:
                        filterbuizen die zeewater opvangen, filteren, en direct omzetten in bruikbaar en zoet water voor
                        de
                        bewoners. Deze oplossing kan helpen het eiland duurzaam van water te voorzien, wat essentieel is
                        nu het eiland steeds meer risico loopt door de klimaatverandering.

                        Om dit systeem te installeren en Tuvalu te beschermen, hebben we donaties nodig. Met jullie
                        hulp kunnen we deze filterbuizen bouwen en een levenslijn bieden aan de gemeenschap die
                        dagelijks wordt geconfronteerd met de dreiging van overstromingen en waterschaarste.</p>
                </div>
               
                    <a href="./doneren.php" class="main-link">Doneer nu om Tuvalu te redden</a>
                    <a href="./nieuwsbrief.php" class="main-link">Meld je aan voor onze nieuwsbrief</a>
               
            </div>
        </section>
        
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
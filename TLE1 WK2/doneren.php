<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/doneren.css">
</head>

<body>
    <nav> </nav>
    <main>
        <div class=pagediv>
            <div class=divide1>
                <H1>Hier kunt u doneren aan Tuvalu</H1>

                <form action="">
                    <div class=formdiv>
                        <div class=inputdiv>
                            <label for="name">Uw naam</label>
                            <input type="text" id="name" name="name" placeholder="Naam" required maxlength="20">
                        </div>
                        <div class=inputdiv>
                            <label for="donation">Uw donatie</label>
                            <input type="number" id="donation" name="donation" placeholder="€..." required min="0" step="0.01">
                        </div>

                        <button type="submit">Doneren</button>
                    </div>
                </form>
            </div>

            <div class=divide2>

                <H1>Totaal gedoneerd bedrag</H1>
                <img src="img\heartborder.png" hartje" width="100%">
                <p>php berekend bedrag hier</p>

            </div>
        </div>
        <div>
            <H1>Dank voor al uw gulle donaties!</H1>
        </div>

    </main>
</body>

</html>
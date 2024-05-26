<!DOCTYPE html>
<html lang="NL-nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/News-logo.gif" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Action News</title>
</head>
<body>
    <nav>
        <div class="nav-div1">
            <img src="./Assets/News-logo.gif" class="nav-logo">
            <ul>
                <a href="home.php"><li class="actief">Home</li></a>
                <a href="dieren.php"><li>Dieren</li></a>
                <a href="oorlog.php"><li>Oorlog</li></a>
            </ul>
        </div>
    </nav>

    <h1 class="home-titel">Laatste Nieuws</h1>

    <div class="nieuws-div">

        <?php

            include "function.php";

            Views();
            laatsteNieuwsDieren();
            laatsteNieuwsOorlog();

        ?>

    </div>

    <footer>
        <p class="copy">ⓒ 2024 Rotterdam Nederlands, Inc. Alle rechten voorbehouden.</p>
    </footer>

</body>
</html>
<!DOCTYPE html>
<html lang="NL-nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/News-logo.gif" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Toevoegen</title>
</head>
<body>
<nav>
        <div class="nav-div1">
            <img src="./Assets/News-logo.gif" class="nav-logo">
            <ul>
                <a href="home.php"><li>Home</li></a>
                <a href="dieren.php"><li>Dieren</li></a>
                <a href="oorlog.php"><li>Oorlog</li></a>
            </ul>
        </div>
    </nav>

    <p class="terug"><a class="nav-a" href="javascript:history.go(-1)">&#11207;Terug</a></p>

    <div class="div-toevoegen">

        <img src="./Assets/toevoegen-form.png" class="toevoegen-img">

        <?php

            include "function.php";
            toevoegenTabel();
            Toevoegen();

        ?>

    </div>

    <footer class="footer1">
        <p class="copy">ⓒ 2024 Rotterdam Nederlands, Inc. Alle rechten voorbehouden.</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
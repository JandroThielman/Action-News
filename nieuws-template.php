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

    <?php

        include "function.php";
        WijzigenInfo();
        Verwijderen();
        Share();
    
    ?>

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

    <?php

        terug();

    ?>

    <a href="wijzigen.php?database=<?php echo $_GET['database'];?>&id=<?php echo $_GET['id'];?>&bekeken=<?php echo $result['bekeken'];?>"><img class="edit-news" src="./Assets/edit-news.png"></a>
    <form method="post">
        <button class="verw-btn" name="verwijder" type="submit"><img src="./Assets/verwijder-news.svg" class="verwijder-news"></button>
    </form>

    <?php

        
        Template();
        BerichtNieuws();

    ?>

    <footer class="footer1">
        <p class="copy">ⓒ 2024 Rotterdam Nederlands, Inc. Alle rechten voorbehouden.</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
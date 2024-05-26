<?php

    function  laatsteNieuwsDieren(){
        include "connect.php";

        $query = $db->prepare("SELECT titel FROM dieren WHERE id = 1");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $dNieuws) {

            echo '<div>';

                echo '<img class="home-nieuws1" src="./Assets/dn1.png">';
                echo "<form method='post'>";
                    echo "<input type='hidden' name='database' value='dieren'>";
                    echo "<input type='hidden' name='id' value='1'>";
                    echo "<input type='hidden' name='link' value='nieuws-template.php?database=dieren&id=1'>";
                    echo '<button class="link-v" name="bekeken" type="submit"><h3 class="home-nieuws1-titel">' . $dNieuws['titel'] . '</h3></button>';
                echo "</form>";
            
            echo '</div>';

        }


    }

    function  laatsteNieuwsOorlog(){
        include "connect.php";

        $query = $db->prepare("SELECT titel FROM oorlog WHERE id = 3");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $oNieuws) {

            echo '<div>';

                echo '<img class="home-nieuws2" src="./Assets/on3.png">';
                echo "<form method='post'>";
                    echo "<input type='hidden' name='database' value='oorlog'>";
                    echo "<input type='hidden' name='id' value='3'>";
                    echo "<input type='hidden' name='link' value='nieuws-template.php?database=oorlog&id=3'>";
                    echo '<button class="link-v" name="bekeken" type="submit"><h3 class="home-nieuws2-titel">' . $oNieuws['titel'] . '</h3></button>';
                echo "</form>";

            echo '</div>';

        }
    }

    function dierenNieuws(){
        include "connect.php";

        $query = $db->prepare("SELECT * FROM dieren");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $dieren) {

            echo "<div class='dieren-div'>";

                echo "<img class='dn1' src='./Assets/" . $dieren['foto'] . "'/>";
                echo "<form method='post'>";
                    echo "<input type='hidden' name='database' value='dieren'>";
                    echo "<input type='hidden' name='id' value='" . $dieren['id'] ."'>";
                    echo "<input type='hidden' name='link' value='nieuws-template.php?database=dieren&id=" . $dieren['id'] . "''>";
                    echo "<button class='link-v' name='bekeken' type='submit'><h3 class='home-nieuws-titel'>" . $dieren['titel'] . "</h3></button>";
                echo "</form>";

            echo "</div>";

        }
    }

    function oorlogNieuws(){
        include "connect.php";

        $query = $db->prepare("SELECT * FROM oorlog");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $oorlog) {

            echo "<div class='dieren-div'>";

                echo "<img class='dn1' src='./Assets/" . $oorlog['foto'] . "'/>";
                echo "<form method='post'>";
                    echo "<input type='hidden' name='database' value='oorlog'>";
                    echo "<input type='hidden' name='id' value='" . $oorlog['id'] ."'>";
                    echo "<input type='hidden' name='link' value='nieuws-template.php?database=oorlog&id=" . $oorlog['id'] . "'>";
                    echo "<button class='link-v' name='bekeken' type='submit'><h3 class='home-nieuws-titel'><h3 class='home-nieuws-titel'>" . $oorlog['titel'] . "</h3></button>";
                echo "</form>";

            echo "</div>";

        }
    }

    function Template(){
        include "connect.php";

        $database = $_GET['database'];
        $id = $_GET['id'];
        $query = $db->prepare("SELECT * FROM $database WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($database == 'dieren') {

                echo "<div class='template-div1'>";

                    echo "<div class='views-mv'>";
                    
                        echo '<video class="imgVideo" height="400px" controls>';
                            echo '<source src="./Assets/' . $result['video'] . '">';
                        echo '</video>';

                        echo "<h4 class='views-txt'>" . $result['bekeken'] . " Views</h4>";

                    echo "</div>";

                    echo "<div>";
                        echo "<h2 class='template-titel'>" . $result['titel'] . "</h2>";
                        echo "<h4 class='template-verhaal'>" . $result['verhaal'] . "</h4>";

                        echo "<form method='post' class='reaction-form'>";
                            echo "<input type='text' name='msg' placeholder='Bericht Schrijven' class='reactie-balk' autocomplete='off'>";
                            echo "<button type='submit' class='send-msg-btn' name='sendmsg'>";
                                echo "<img src='./Assets/send-message.svg' class='send-msg'/>";
                            echo "</button>";

                            echo '<button type="submit" class="share-msg-btn" name="share-msg">';
                                echo "<img src='./Assets/share.svg' class='share-msg'/>";
                            echo "</button>";
                        echo "</form>";

                        echo "<div class='scroll-div-msg'>";

                            Berichten();

                        echo "</div>";

                    echo "</div>";
                echo "</div>";

                echo "<script src='copy.js'></script>";

            } elseif ($database == 'oorlog') {

                echo "<div class='template-div'>";

                    echo "<div class='views-mv'>";

                        echo "<img class='imgVideo' width='600px' src='./Assets/" . $result['foto'] . "'/>";

                        echo "<h4 class='views-txt'>" . $result['bekeken'] . " Views</h4>";
                        
                    echo "</div>";

                        echo "<div>";

                            echo "<h2 class='template-titel'>" . $result['titel'] . "</h2>";
                            echo "<h4 class='template-verhaal1'>" . $result['verhaal'] . "</h4>";

                        echo "</div>";

                echo "</div>";

                echo "<div class='msg-main'>";

                    echo "<form method='post' class='reaction-form'>";

                        echo "<input type='text' name='msg' placeholder='Bericht Schrijven' class='reactie-balk' autocomplete='off'>";
                        echo "<button type='submit' class='send-msg-btn' name='sendmsg'>";
                            echo "<img src='./Assets/send-message.svg' class='send-msg'/>";
                        echo "</button>";

                        echo '<button type="submit" class="share-msg-btn" name="share-msg">';
                            echo "<img src='./Assets/share.svg' class='share-msg'/>";
                        echo "</button>";

                    echo "</form>";

                    echo "<div class='scroll-div-msg'>";

                        Berichten();

                    echo "</div>";
                
                echo "</div>";

            }
        
    }

    function Toevoegen(){
        include "connect.php";
        $database = $_GET['database'];

        if ($database == 'dieren') {
            if (isset($_POST['btn-toevoegen'])) {

                $titel = $_POST['titel'];
                $verhaal = $_POST['verhaal'];
                $foto = $_POST['foto'];
                $video = $_POST['video'];

                try {

                    $query = $db->prepare("INSERT INTO $database(id, titel, verhaal, bekeken, foto, video) VALUES (NULL, :titel, :verhaal, '0', :foto, :video)");
                    $query->bindParam(':titel', $titel);
                    $query->bindParam(':verhaal', $verhaal);
                    $query->bindParam(':foto', $foto);
                    $query->bindParam(':video', $video);
                    $query->execute();
                    echo '<script>alert("Nieuws Toegevoegd")</script>';
                    echo "<script> location.replace('" . $database . ".php');</script>";

                } catch (PDOException $e) {
                    echo 'window.alert("Toevoegen is mislukt");';
                }
            }
        } elseif ($database == 'oorlog') {
            if (isset($_POST['btn-toevoegen'])) {

                $titel = $_POST['titel'];
                $verhaal = $_POST['verhaal'];
                $foto = $_POST['foto'];

                try {

                    $query = $db->prepare("INSERT INTO $database(id, titel, verhaal, bekeken, foto) VALUES (NULL, :titel, :verhaal, '0', :foto)");
                    $query->bindParam(':titel', $titel);
                    $query->bindParam(':verhaal', $verhaal);
                    $query->bindParam(':foto', $foto);
                    $query->execute();
                    echo '<script>alert("Nieuws Toegevoegd")</script>';
                    echo "<script> location.replace('" . $database . ".php');</script>";
                    
                } catch (PDOException $e) {
                    echo '<script>alert("Toevoegen is mislukt")</script>;';
                }
            }
        }

    }

    function toevoegenTabel(){

        $database = $_GET['database'];

        if ($database == 'dieren') {

            echo'<form autocomplete="off" class="toevoegen-form" method="post">';

                echo'<h2 class="form-titel">Toevoegen</h2>';

                echo'<label class="form-tekst">Titel:</label><br>';
                echo'<input required class="form-input form-input1" type="text" name="titel" placeholder="Titel van de Verhaal"><br><br>';

                echo'<label class="form-tekst">Verhaal:</label><br>';
                echo'<textarea class="form-input" placeholder="Verhaal" name="verhaal" rows="7" cols="30"></textarea><br><br>';

                echo'<label class="form-tekst">Foto:</label><br>';
                echo'<input class="form-input form-input1" type="text" name="foto" placeholder="Foto naam bijv. (img1.png)"><br><br>';

                echo '<label class="form-tekst">Video:</label><br>';
                echo '<input class="form-input form-input1" type="text" name="video" placeholder="Video naam bijv. (vid1.mp4)"><br><br>';

                echo '<button class="btn-toevoegen" name="btn-toevoegen" type="submit">Toevoegen</button>';
        
            echo '</form>';
                
        } elseif($database == 'oorlog'){

            echo'<form autocomplete="off" class="toevoegen-form" method="post">';

                echo'<h2 class="form-titel1">Toevoegen</h2>';

                echo'<label class="form-tekst">Titel:</label><br>';
                echo'<input class="form-input form-input1" type="text" name="titel" placeholder="Titel van de Verhaal"><br><br>';

                echo'<label class="form-tekst">Verhaal:</label><br>';
                echo'<textarea class="form-input" placeholder="Verhaal" name="verhaal" rows="7" cols="30"></textarea><br><br>';

                echo'<label class="form-tekst">Foto:</label><br>';
                echo'<input class="form-input form-input1" type="text" name="foto" placeholder="Foto naam bijv. (img1.png)"><br><br>';

                echo '<button class="btn-toevoegen" name="btn-toevoegen" type="submit">Toevoegen</button>';
        
            echo '</form>';

        }

    
    }

    function Wijzigen(){
        include "connect.php";
        $database = $_GET['database'];
        $id = $_GET['id'];

        if ($database == 'dieren') {
            if (isset($_POST['btn-wijzigen'])) {

                $titel = $_POST['titel'];
                $verhaal = $_POST['verhaal'];
                $foto = $_POST['foto'];
                $video = $_POST['video'];
                $berekenen = $_GET['bekeken'];

                $query = $db->prepare("UPDATE $database SET id = :id, titel = :titel, verhaal = :verhaal, bekeken = :berekenen, foto = :foto, video = :video WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->bindParam(':titel', $titel);
                $query->bindParam(':verhaal', $verhaal);
                $query->bindParam(':foto', $foto);
                $query->bindParam(':video', $video);
                $query->bindParam(':berekenen', $berekenen);
                $query->execute();
                echo '<script>window.alert("Nieuws Gewijzigd")</script>';
                echo "<script> location.replace('" . $database . ".php');</script>";

            }
        } elseif ($database == 'oorlog') {
            if (isset($_POST['btn-wijzigen'])) {

                $titel = $_POST['titel'];
                $verhaal = $_POST['verhaal'];
                $foto = $_POST['foto'];
                $video = $_POST['video'];
                $berekenen = $_GET['bekeken'];

                $query = $db->prepare("UPDATE $database SET id = :id, titel = :titel, verhaal = :verhaal, bekeken = :berekenen, foto = :foto WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->bindParam(':titel', $titel);
                $query->bindParam(':verhaal', $verhaal);
                $query->bindParam(':foto', $foto);
                $query->bindParam(':berekenen', $berekenen);
                $query->execute();
                echo '<script>window.alert("Nieuws Gewijzigd")</script>';
                echo "<script> location.replace('" . $database . ".php');</script>";

            }
        }

    }

    function WijzigenInfo(){
        include "connect.php";
        
        global $database;
        $database = $_GET['database'];
        $id = $_GET['id'];

        $query = $db->prepare("SELECT * FROM $database WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        global $result;
        $result = $query->fetch(PDO::FETCH_ASSOC);
    }

    function wijzigenTabel(){

        include "connect.php";
        
        global $database;
        $database = $_GET['database'];
        $id = $_GET['id'];

        $query = $db->prepare("SELECT * FROM $database WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        global $result;
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($database == 'dieren') {

            echo'<form class="wijzigen-form" method="post" autocomplete="off">';

                echo'<h2 class="form-titel">Wijzigen</h2>';

                echo'<label class="form-tekst">Titel:</label>';
                echo'<input required class="form-input form-input1" type="text" name="titel" placeholder="Titel van de Verhaal" value="' . $result['titel'] . '"><br>';

                echo'<label class="form-tekst">Verhaal:</label>';
                echo'<textarea class="form-input" placeholder="Verhaal" name="verhaal" rows="7" cols="30">' . $result['verhaal'] . '</textarea><br>';

                echo'<label class="form-tekst">Foto:</label>';
                echo'<input class="form-input form-input1" type="text" name="foto" placeholder="Foto naam bijv. (img1.png)" value="' . $result['foto'] . '"><br>';

                echo '<label class="form-tekst">Video:</label>';
                echo '<input class="form-input form-input1" type="text" name="video" placeholder="Video naam bijv. (vid1.mp4)" value="' . $result["video"] . '"><br>';

                echo '<button class="btn-toevoegen" name="btn-wijzigen" type="submit">Wijzigen</button>';
        
            echo '</form>';
                
        } elseif($database == 'oorlog'){

            echo'<form class="wijzigen-form1" method="post" autocomplete="off">';

                echo'<h2 class="form-titel1">Wijzigen</h2>';

                echo'<label class="form-tekst">Titel:</label>';
                echo'<input class="form-input form-input1" type="text" name="titel" placeholder="Titel van de Verhaal" value="' . $result['titel'] . '"><br>';

                echo'<label class="form-tekst">Verhaal:</label>';
                echo'<textarea class="form-input" placeholder="Verhaal" name="verhaal" rows="7" cols="30">' . $result['verhaal'] . '</textarea><br>';

                echo'<label class="form-tekst">Foto:</label>';
                echo'<input class="form-input form-input1" type="text" name="foto" placeholder="Foto naam bijv. (img1.png)" value="' . $result['foto'] . '"><br>';

                echo '<button class="btn-toevoegen" name="btn-wijzigen" type="submit">Wijzigen</button>';
    
            echo '</form>';

        }

    
    }

    function Verwijderen(){
        include "connect.php";

        if (isset($_POST['verwijder'])) {
            try {

                $database = $_GET['database'];
                $id = $_GET['id'];
    
                $query = $db->prepare("DELETE FROM $database WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();

                echo '<script>window.alert("Nieuws Verwijderd")</script>';
                echo "<script> location.replace('" . $database . ".php');</script>";
                
            } catch (PDOException $e) {
                echo '<script>alert("' . $e->getMessage() . '")</script>'; 
                echo "<script> location.replace('home.php');</script>";
            }
        }
    }

    function BerichtNieuws(){
        include "connect.php";
        
        $database = $_GET['database'];
        $id = $_GET['id'];

        if (isset($_POST['sendmsg'])) {
            $bericht = $_POST['msg'];
            $query = $db->prepare("INSERT INTO berichten(id, bericht, db, nieuwsid) VALUES (NULL, :bericht, :db, :nid)");
            $query->bindParam(':nid', $id);
            $query->bindParam(':bericht', $bericht);
            $query->bindParam(':db', $database);
            $query->execute();
            header("Refresh:0");
        }
    }

    function Berichten(){
        include "connect.php";
        $database = $_GET['database'];
        $id = $_GET['id'];

        $query = $db->prepare("SELECT * FROM berichten WHERE db = :db AND nieuwsid = :id ORDER BY berichten.id DESC");
        $query->bindParam(':db', $database);
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $msg) {
            echo "<h3 class='msg-txt'>&#8226; " . $msg['bericht'] . "</h3>";
        }
    }

    function terug(){

        $database = $_GET['database'];

        if ($database == 'dieren') {
            echo '<p class="terug"><a class="nav-a" href="dieren.php">&#11207;Terug</a></p>';
        }   elseif ($database == 'oorlog') {
            echo '<p class="terug"><a class="nav-a" href="oorlog.php">&#11207;Terug</a></p>';
        }
        
    }

    function Share(){
        include "connect.php";

        $database = $_GET['database'];
        $id = $_GET['id'];

        $query = $db->prepare("SELECT * FROM $database WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (isset($_POST['share-msg'])) {
            header("Location: mailto:&subject=Action News📰⚠️🚨&body=" . $result['titel'] . "");
            exit;
        }
    }

    function Views(){
        include "connect.php";

        if (isset($_POST['bekeken'])) {

            $database = $_POST['database'];
            $id = $_POST['id'];
            $link = $_POST['link'];
        
            $query = $db->prepare("UPDATE $database SET bekeken = bekeken + 1 WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->execute();

            header("Location: " . $link);
            exit;

        }

    }

?>
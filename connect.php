<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=nieuws", "root", "");
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage()); 
    }

?>
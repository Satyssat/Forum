<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=forum;charset=utf8;", "root", "satya02");
} catch (Exception $e) {
    die("Une erreur à été trouvée : " + $e->getMessage());
}

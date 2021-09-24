<?php

require('../database.php');

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $idOfQuestion = $_Get['id'];

    $checkIfArticleExist = $bdd->prepare('SELECT * FROM question WHERE id = ?');
    $checkIfArticleExist->execute($idOfQuestion);

    if ($checkIfArticleExist->rowCount() > 0) {
        $questionsInfo
    } else {
        echo "aucune question n'a été trouvée";
    }
} else {
    echo " Aucun article n' été trouvé";
}

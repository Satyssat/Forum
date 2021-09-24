<?php
require('../users/securityAction.php');
require('../database.php');


if (isset($_GET['id']) and !empty($_GET['id'])) {

    $idOfTheQuestion = $_GET['id'];

    $checkIfTheQuestionExist = $bdd->prepare('SELECT id_auteur FROM question where id = ?');
    $checkIfTheQuestionExist->execute(array($idOfTheQuestion));

    if ($checkIfTheQuestionExist->rowCount() > 0) {

        $questionsInfos = $checkIfTheQuestionExist->fetch();
        if ($_SESSION['id'] == $questionsInfos['id_auteur']) {

            $deleteQuestion = $bdd->prepare('DELETE FROM question where id = ?');
            $deleteQuestion->execute(array($_GET['id']));

            header('location: ../../myQuestions.php');
        } else {
            echo "Vous n'êtes pas l'auteur de la question";
        }
    } else {
        echo "question introuvable";
    }
} else {
    echo "Supression imposssible";
}

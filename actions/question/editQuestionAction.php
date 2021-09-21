<?php
require('./actions/database.php');


if (isset($_GET['id']) and !empty($_GET['id'])) {
    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM question where id = ?');
    $checkIfQuestionExist->execute(array($idOfQuestion));

    if ($checkIfQuestionExist->rowCount() > 0) {
        $questionInfo = $checkIfQuestionExist->fetch();
        if ($questionInfo['id_auteur'] == $_SESSION['id']) {
            $questionTitle = $questionInfo['titre'];
            $questionDescription = $questionInfo['description'];
            $questionContent = $questionInfo['contenu'];
            $questionDate = $questionInfo['date_publication'];
        } else {
            $errorMsg = "Vous ne pouvez pas modifier cette question";
        }
    } else {
        $errorMsg = "Aucune queston n'a été trouvée";
    }
} else {
    $errorMsg = "Aucune queston n'a été trouvée";
}
// $getDataQuestion = $bdd->prepare('SELECT titre, description, contenu, date_publication FROM question where id_auteur = ?');
// $getDataQuestion->execute(array($_SESSION['id']));

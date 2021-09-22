<?php
require('./actions/database.php');

// Vérifier si l'id de la question est bien passé en paramètre dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $idOfQuestion = $_GET['id'];

    // Vérifier si la question existe
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM question where id = ?');
    $checkIfQuestionExist->execute(array($idOfQuestion));

    if ($checkIfQuestionExist->rowCount() > 0) {
        $questionInfo = $checkIfQuestionExist->fetch();

        //Vérifier si c'est bien l'auteur de la question qui accède à la modification de la question
        if ($questionInfo['id_auteur'] == $_SESSION['id']) {
            $questionTitle = $questionInfo['titre'];
            $questionDescription = $questionInfo['description'];
            $questionContent = $questionInfo['contenu'];
            $questionDate = $questionInfo['date_publication'];
            $questionId = $questionInfo['id'];


            $questionContent = str_replace("<br />", "", $questionContent);
            $questionDescription = str_replace("<br />", "", $questionDescription);
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

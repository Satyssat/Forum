<?php

require('actions/database.php');

// Vérifier si l'id de la question dest rentrée dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {
    //Récupérer l'id de la question
    // $idOfQuestion = $_Get['id'];

    // Récupérer infos question dont l'id est passé en paramètre
    $checkIfAQuestionExist = $bdd->prepare('SELECT * FROM question WHERE id = ?');
    $checkIfAQuestionExist->execute(array($_GET['id']));

    // si un résultat à été trouvé 
    if ($checkIfAQuestionExist->rowCount() > 0) {
        //Stock toutes les infos dans £questionsINFO
        $questionsInfos = $checkIfAQuestionExist->fetch();

        // On attribue chaque données dans une variable
        $questionTitle = $questionsInfos['titre'];
        $questionContent = $questionsInfos['contenu'];
        $questionIdAuthor = $questionsInfos['id_auteur'];
        $questionPublicationDate = $questionsInfos['date_publication'];
        $questionPseudoAuthor = $questionsInfos['pseudo_auteur'];
    } else {
        echo "aucune question n'a été trouvée";
    }
} else {
    echo " Aucun article n' été trouvé";
}

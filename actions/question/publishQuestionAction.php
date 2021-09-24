<?php
require('actions/database.php');

//Valider le formulaire
if (isset($_POST['validate'])) {

    // Vérifier si les champs ne sont pas vide
    if (!empty($_POST['title'] and !empty($_POST['description']) and !empty($_POST['content']))) {

        //Donnée de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];
        $question_date = date('d/m/y  H:i');

        // Insérer la question sur le site
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO question(titre, description, contenu, id_auteur, pseudo_auteur,date_publication)VALUES(?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_description,
                $question_content,
                $question_id_author,
                $question_pseudo_author,
                $question_date
            )
        );
        header('location: myQuestions.php');
        $successMsg = 'Votre question a bien été publiée sur le site';
    } else {
        $errorMsg = "Veuillez remplir tous les champs";
    }
}

<?php

require('actions\database.php');

// Bonton Modifier* appuyé
if (isset($_POST['validate'])) {
    // Si les champs ne sont pas vide
    if (!empty($_POST['title']) and !empty($_POST['content'])) {
        // On Attibu les changement dans les 3 variables ci dessou
        $newQuestionTitle = htmlspecialchars($_POST['title']);
        $newQuestionContent = nl2br(htmlspecialchars($_POST['content']));

        // On Update la base de donnée ou l'id de la question est entrée en paramètre dans l'url (id = $idOfQuestion)
        $editQuestionOnWebsite = $bdd->prepare('UPDATE question SET titre = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($newQuestionTitle,  $newQuestionContent, $idOfQuestion));

        // Redirection vers la page d'avant ( Mes questions)
        header('Location: myQuestions.php');
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}

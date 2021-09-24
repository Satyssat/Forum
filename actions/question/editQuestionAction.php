<?php

require('actions\database.php');

// Bonton Modifier* appuyé
if (isset($_POST['validate'])) {
    // Si les champs ne sont pas vide
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {
        // On Attibu les changement dans les 3 variables ci dessou
        $newQuestionTitle = htmlspecialchars($_POST['title']);
        $newQuestionDescription = nl2br(htmlspecialchars($_POST['description']));
        $newQuestionContent = nl2br(htmlspecialchars($_POST['content']));

        // On Update la base de donnée ou l'id de la question est entrée en paramètre dans l'url (id = $idOfQuestion)
        $editQuestionOnWebsite = $bdd->prepare('UPDATE question SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($newQuestionTitle, $newQuestionDescription, $newQuestionContent, $idOfQuestion));

        // Redirection vers la page d'avant ( Mes questions)
        header('Location: myQuestions.php');
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}

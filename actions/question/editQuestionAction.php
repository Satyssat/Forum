<?php

require('actions\database.php');

if (isset($_POST['validate'])) {
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {
        $newQuestionTitle = htmlspecialchars($_POST['title']);
        $newQuestionDescription = nl2br(htmlspecialchars($_POST['description']));
        $newQuestionContent = nl2br(htmlspecialchars($_POST['content']));
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}

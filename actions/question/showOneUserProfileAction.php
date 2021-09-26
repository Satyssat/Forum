<?php

require('actions/database.php');


// $getAnswersOfUsers = $bdd->prepare('SELECT id_question,contenu,pseudo_auteur from answers WHERE id_auteur = ? ORDER BY id DESC LIMIT 0,5');
// $getAnswersOfUsers->execute(array($_SESSION['id']));

$getAnswersOfUsers = $bdd->prepare('SELECT question.titre,answers.id_question,answers.contenu,question.pseudo_auteur,question.id,question.date_publication FROM answers,question WHERE answers.id_question = question.id AND answers.id_auteur = ? ORDER BY answers.id desc LIMIT 0,5');
$getAnswersOfUsers->execute(array($_SESSION['id']));
// while($questions = $getAnswersOfUsers->fetch()){
//     $
// }
// $getQuestionsOfUsers = $bdd->prepare('SELECT id, pseudo_auteur, date_publication from questions where id = ?');
// $getQuestionsOfUsers->execute(array());
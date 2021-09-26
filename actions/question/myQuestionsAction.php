<?php
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT id,titre FROM question where id_auteur = ? ORDER BY id DESC ');
$getAllMyQuestions->execute(array($_SESSION['id']));

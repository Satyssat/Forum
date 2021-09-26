<?php
require('actions\database.php');


// Récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id,titre, contenu, pseudo_auteur, date_publication from question ORDER BY id DESC LIMIT 0,5');

// Vérifier si une recherche à été rentrée par l'utilisateur
if (isset($_GET['search']) and !empty($_GET['search'])) {



    //La recherche
    $usersSearch = $_GET['search'];
    // récupérer toute les questions correspondant à la recherche
    $getAllQuestions = $bdd->query(
        'SELECT id,titre, contenu, pseudo_auteur, date_publication FROM question WHERE titre LIKE "%' . $usersSearch . '%" ORDER BY id desc'
    );
}

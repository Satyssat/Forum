<?php
session_start();
require('actions/database.php');


if (isset($_POST['validate'])) {

    // Vérifier si l'user a bien complété tous les champs

    if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {
        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExist->execute(array($user_pseudo));

        //Vérifier si le pseudo est correct
        if ($checkIfUserExist->rowCount() > 0) {

            //Récupérer les données de l'utilisateur
            $usersInfo = $checkIfUserExist->fetch();

            //Vérifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfo['mdp'])) {

                //Authentifier utilisateur sur le site et récupérer ses données dans des variables globales sessions

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfo['id'];
                $_SESSION['pseudo'] = $usersInfo['pseudo'];
                $_SESSION['lastname'] = $usersInfo['nom'];
                $_SESSION['firstname'] = $usersInfo['prenom'];
                $_SESSION['test'] = "sessionTestOk";

                //Redirection de l'utilisateur vers la page d'accueil
                header('location: index.php');
            } else {
                $errorMsg = "Le Mot de passe est incorrect";
            }
        } else {
            $errorMsg = "Le Pseudo est incorrect...";
        }
    } else {
        $errorMsg = "Veuillez complétez tous les champs";
    }
}

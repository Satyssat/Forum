<?php
require("./actions/database.php");

// Validation du formulaire

if (isset($_POST['validate'])) {

    // Vérifier si l'user a bien complété tous les champs

    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])) {
        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Vérifier si l'user n'existe pas déja
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        // Si user n'existe pas ( si aucune ligne ne correspond au pseudo de l'user donc pseudo = introuvable)
        if ($checkIfUserAlreadyExists->rowCount() == 0) {
            // -> insérer infos de user dans bases de donnée
            $inserUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp)VALUES (?,?,?,?)');
            $inserUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            // On sélèctionne les infos de l'user 
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_password));

            // On stock les infos de l'user dans variable ($usersInfo)
            $usersInfo = $getInfosOfThisUserReq->fetch();

            //Authentifier utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfo['id'];
            $_SESSION['pseudo'] = $usersInfo['pseudo'];
            $_SESSION['lastname'] = $usersInfo['nom'];
            $_SESSION['firstname'] = $usersInfo['prenom'];
            $_SESSION['test'] = "sessionTestOk";

            //On redirige vers index.php
            header('location: index.php');
        } else {

            $errorMsg = "L'utilisateur existe déjà";
        }
    } else {
        $errorMsg = "Veuillez complétez tous les champs";
    }
}

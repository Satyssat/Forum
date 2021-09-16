<?php
require("./actions/database.php");

if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])) {
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {
            $inserUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp)VALUES (?,?,?,?)');
            $inserUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_password));

            $usersInfo = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfo['id'];
            $_SESSION['pseudo'] = $usersInfo['pseudo'];
            $_SESSION['lastname'] = $usersInfo['nom'];
            $_SESSION['firstname'] = $usersInfo['prenom'];
            $_SESSION['test'] = "sessionTestOk";
        } else {

            $errorMsg = "L'utilisateur existe déjà";
        }
    } else {
        $errorMsg = "Veuillez complétez tous les champs";
    }
}

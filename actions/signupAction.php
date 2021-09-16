<?php
require("./actions/database.php");

if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])) {
    } else {
        $errorMsg = "Veuillez complétez tous les champs";
    }
}

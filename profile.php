<?php
require('actions/users/securityAction.php');
require('actions/question/showOneUserProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/style.css">
<?php
include('includes/head.php');
?>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <div class="containerOfProfile">
        <div class="card" style="width: 15rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Pseudo : <?= $_SESSION['pseudo'] ?></li>
                <li class="list-group-item">Prénom : <?= $_SESSION['firstname'] ?></li>
                <li class="list-group-item">Nom : <?= $_SESSION['lastname'] ?></li>
            </ul>
        </div>
        <?php
        while ($answers = $getAnswersOfUsers->fetch()) {
        ?>
            <div class="card p-3" style="float:right">
                <div class="card-header">
                    Postée par <?= $answers['pseudo_auteur']  ?> Le <?= $answers['date_publication'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Titre de la question : <?= $answers['titre'] ?></h5>
                    <p class="card-text">Votre Réponse : <?= $answers['contenu'] ?></p>
                    <a href="article.php?id=<?= $answers['id_question'] ?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</body>

</html>
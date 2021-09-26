<?php
include('actions/users/securityAction.php');
include('actions/question/myQuestionsAction.php');

// include('actions\question\getInfoOfEditedQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
include("includes/head.php");
?>

<body>
    <?php
    include("includes/navbar.php"); ?>


    <br></br>
    <div class="container">

        <?php
        // On affiche autant de question avec titre contenu et id( pour modifier) 
        // qu'il y en a dans la bdd selon l'auteur
        while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="article.php?id=<?= $question['id']; ?>"> <?= $question['titre']; ?></a>
                </h5>
                <div class="card-body">
                    <a href="article.php?id=<?= $question['id']; ?>" class=" btn btn-info">Accéder à la question</a>
                    <a href="editQuestion.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions\question\deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
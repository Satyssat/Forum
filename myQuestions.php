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
        // On affiche autant de question avec titre description contenu et id( pour modifier) 
        // qu'il y en a dans la bdd selon l'auteur
        while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class="card">
                <h5 class="card-header">
                    <?php echo $question['titre']; ?>
                </h5>
                <div class="card-body">
                    <p class="card-text"><?php echo $question['description']; ?></p>
                    <a href="#" class="btn btn-info">Accéder à la question</a>
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
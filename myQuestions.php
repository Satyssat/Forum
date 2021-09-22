<?php
include('actions/question/myQuestionsAction.php');
include('actions/users/securityAction.php');
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
        while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class="card">
                <h5 class="card-header">
                    <?php echo $question['titre']; ?>
                </h5>
                <div class="card-body">
                    <p class="card-text"><?php echo $question['description']; ?></p>
                    <a href="#" class="btn btn-info">Accéder à la question</a>
                    <a href="" class="btn btn-warning">Modifier la question</a>
                    <!-- editQuestion.php?=<?= $questionId ?> -->
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
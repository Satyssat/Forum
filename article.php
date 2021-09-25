<?php
include('actions/users/securityAction.php');
include('actions/question/showArticleContentAction.php');
require('actions/question/postAnswerAction.php');
require('actions/question/showAllAnswersOfQuestionAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include("includes/head.php");
?>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <br></br>
    <div class="container">
        <?php

        if (isset($errorMsg)) {
            echo $errorMsg;
        }
        if (isset($questionPublicationDate)) {
        ?>
            <section class="show-content">
                <h3><?= $questionTitle; ?></h3>
                <hr>

                <p><?= $questionContent; ?></p>
                <hr>
                <small><?= $questionPseudoAuthor . ' le ' . $questionPublicationDate ?>
            </section>
            <br>
            <br>
            <section class="show-answers">

                <form class="form-group" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Réponse :</label>
                        <textarea name="answer" class="form-control"></textarea>
                        <br>
                        <button class="btn btn-primary" name="validate">Répondre</button>
                    </div>

                </form>

                <?php
                while ($answers = $getAllAnswersOfThisQuestion->fetch()) {
                ?>
                    <div class="card">
                        <div class="bg-success p-2 text-white">
                            <?= $answers['pseudo_auteur'] ?>
                        </div>
                        <div class="bg-success p-2" style="--bs-bg-opacity: .25;">
                            <?= $answers['contenu'] ?>
                        </div>
                    </div>
                    <br>
                <?php
                }
                ?>

            </section>
        <?php
        }

        ?>
    </div>
</body>

</html>
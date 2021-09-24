<?php
require('actions/users/securityAction.php');
require('actions\question\getInfoOfEditedQuestionAction.php');
require('actions\question\editQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>

<body>
    <?php include('includes/navbar.php'); ?>


    <br></br>
    <div class="container">
        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        }
        ?>

        <?php
        if (isset($questionContent)) {
        ?>
            <form method="POST">

                <div class="badge bg-warning text-wrap text-secondary" style="width: 20em;">
                    <h5>Date de publication : <?= $questionDate ?></h5>
                </div>
                <br></br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<?= $questionTitle ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                    <textarea class="form-control" name="description"><?= $questionDescription ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content"><?= $questionContent ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
            </form>
        <?php
        }
        ?>

    </div>


</body>

</html>
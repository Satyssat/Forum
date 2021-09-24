<?php include('actions/users/securityAction.php');
include('actions/question/showArticleContentAction.php'); ?>
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
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea class="form-control" name="content"><?= $contenOfQuestion ?></textarea>
        </div>
    </div>
</body>

</html>
<?php require_once "components/header.php"; ?>



<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php 
    if (isset($_GET['id'])):
        $id = $_GET['id'];
          
?>


    <?= getArticle($id) ?>
        

<?php endif; ?>


<?php require_once "components/footer.php"; ?>
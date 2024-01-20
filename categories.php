<?php require_once "components/header.php"; ?>



<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php
    $title = ":";
    if (isset($_GET['id'])) {
        $result = getCategories((int)$_GET['id']);
        $arr = $result->fetch_array()['nombre'];
        $title = 'sobre '.$arr ;
    }

?>

<h1>Todas las Entradas <?= $title ?></h1>
<?= (isset($_GET['id'])) ? listArticlesforCategory2((int)$_GET['id']) : listArticlesLasted2() ?>





<?php require_once "components/footer.php"; ?>
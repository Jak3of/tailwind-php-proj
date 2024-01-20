
<?php
session_start();
 if (!isset($_GET['search'])) {
     header("Location: ./");
     exit;
        
 }

 require_once "components/header.php"; ?>



<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php
    $articles = getArticlesBySearch($_GET['search']); // listado de articulos or null

    if ($articles != null) {
        $num_articles = $articles->num_rows;
        $articles = $articles->fetch_all(MYSQLI_ASSOC);
    } else {
        $num_articles = 0;
    }

    if ($num_articles == 0) : ?>

    <h1>No se encontraron articulos para la busqueda de "<?= $_GET['search'] ?>"</h1>


    <?php else : ?>
        <h1>Se encontraron <?= $num_articles ?> articulos para la busqueda de "<?= $_GET['search'] ?>"</h1>

        
            <?php foreach ($articles as $article) : ?>
                <article>
                <h2>
                    <?= $article['titulo'] ?>
                </h2>
                <p class='text-sm text-[#4A6FA5] '>
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $article['categoria'] ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= date('d/m/Y', strtotime($article['fecha'])) ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $article['name'] ?>
                        <?= $article['surname'] ?>
                    </span>
                </p>
                <p>
                    <?= $article['descripcion'] ?>
                    <a href='detail.php?id=<?= $article['id_articulo'] ?>' class='text-[#4A6FA5] hover:text-[#4F6D7A]'>Leer mas</a>
                </p>
            </article>
            <?php endforeach; ?>
        

    
    <?php endif; ?>

<?php 
?>





<?php require_once "components/footer.php"; ?>
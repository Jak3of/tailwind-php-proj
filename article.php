<?php 
    session_start(); // Iniciar una nueva sesión siempre
if (!isset($_SESSION['user'])) { 
    $errorlogin = array(); 
    $errorlogin['login']  = "Debes iniciar sesion primero!";
    $_SESSION['erroreslogin'] = $errorlogin;
    header('Location: ./'); 
    exit(); // Terminar la ejecucion para que no ejecute mas codigo
}

require_once "components/header.php"; 
?>


<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php 
    
    (isset($_SESSION['errorarticle'])) ? $errorarticle = $_SESSION['errorarticle'] : '';
    (isset($_SESSION['successarticle'])) ? $successarticle = $_SESSION['successarticle'] : '';
    (isset($_SESSION['erroresarticle'])) ? $erroresarticle = $_SESSION['erroresarticle'] : '';
    
?>

<h1>Crear Articulo:</h1>
<p class="text-[#4F6D7A] text-sm">
    Puedes agregar un nuevo articulo a la base de datos.
</p>

<?= (isset($successarticle)) ? helper($successarticle, 'success') : '' ?>
<?= (isset($errorarticle)) ? helper($errorarticle, 'warning') : '' ?>
<?= (isset($successactualizar)) ? helper($successactualizar, 'success') : '' ?>
<?= (isset($erroractualizar)) ? helper($erroractualizar, 'warning') : '' ?>

<form action="request/q_article.php" method="post" class="
    [&>*]:w-full 
    [&>select]:text-[#4F6D7A] [&>select]:rounded-lg [&>select]:border [&>select]:border-[#4F6D7A]
    [&>select]:p-1 [&>select]:placeholder:text-[#4F6D7A] [&>select]:placeholder:text-sm
    [&>select]:mt-2 [&>select]:shadow-sm [&>select]:shadow-[#4F6D7A]
    [&>select]:focus:outline-none 
    [&>select:option]:text-[#4F6D7A] [&>select:option]:rounded-lg [&>select:option]:border [&>select:option]:border-[#4F6D7A]
    [&>select:option]:p-1 [&>select:option]:placeholder:text-[#4F6D7A] [&>select:option]:placeholder:text-sm
    [&>select:option]:mt-2 [&>select:option]:shadow-sm [&>select:option]:shadow-[#4F6D7A]
    [&>input]:text-[#4F6D7A] [&>input]:rounded-lg [&>input]:border [&>input]:border-[#4F6D7A]
    [&>input]:p-1 [&>input]:placeholder:text-[#4F6D7A] [&>input]:placeholder:text-sm
    [&>input]:mt-2 [&>input]:shadow-sm [&>input]:shadow-[#4F6D7A]
    [&>input]:focus:outline-none
    ">
    <label class="text-[#4F6D7A] text-sm" for="title" class="">Titulo:</label>
    <input class="mb-1" type="text" name="title" placeholder="Ingrese el nombre" id="title">
    <?= (isset($erroresarticle['title'])) ? helper($erroresarticle['title'], 'danger-text') : '' ?>
    <label class="text-[#4F6D7A] text-sm" for="description" class="">Descripción:</label>
    <input class="mb-1" type="text" name="description" placeholder="Ingrese la descripción" id="description">
    <?= (isset($erroresarticle['description'])) ? helper($erroresarticle['description'], 'danger-text') : '' ?>
    <label class="text-[#4F6D7A] text-sm" for="category" class="">Categoría:</label>
    <select class="mb-1" name="category" id="category">
        <?php
            $categories = getCategories();
            if (!empty($categories)) :
            foreach ($categories as $category) :
                ?>

                <option value='<?= $category['id_categoria'] ?>'><?= $category['nombre'] ?></option>

        <?php endforeach; 
            endif;
            ?>
    </select>
    <?= (isset($erroresarticle['category'])) ? helper($erroresarticle['category'], 'danger-text') : '' ?>

    <label class="text-[#4F6D7A] text-sm mb-2" for="content" class="">Contenido:</label>
    <?= (isset($erroresarticle['content'])) ? helper($erroresarticle['content'], 'danger-text') : '' ?>
    
    <textarea class="w-full h-40 my-1" name="content" id="content"></textarea>
    
    
    
    <input class="hover:bg-[#4F6D7A] hover:text-white transition-all duration-200 cursor-pointer hover:translate-y-[2px] hover:translate-x-[-2px]" type="submit" value="Agregar">
</form>

<h2>Lista de Tus Articulos:</h2>
<ul class="flex flex-col gap-2 w-full text-[#4F6D7A] text-sm p-2 border border-[#4F6D7A] rounded-lg 
    [&>li]:w-full [&>li]:flex [&>li]:justify-stretch
    [&>li>*]:p-1 [&>li>*]:border [&>li>*]:border-[#4F6D7A] [&>li>*]:shadow 
    [&>li>a]:w-[80%] [&>li>span]:w-[10%] [&>li>a]:rounded-l-lg [&>li>span:last-child]:rounded-r-lg
    [&>li>span]:flex [&>li>span]:justify-center [&>li>span]:items-center [&>li>span]:text-xl
    [&>li>a]:flex [&>li>a]:items-center [&>li>a]:border-r-0
    [&>li>*]:cursor-pointer [&>li>*:hover]:text-white [&>li>*:hover]:bg-[#4F6D7A]">
    <!--listArticlesall(); -->
    <?php $articles = listArticlesall($_SESSION['user']['id_users']);
        if ($articles->num_rows > 0) :
    ?>
        <?php foreach ($articles as $article) : ?>
            <li class='relative '>
                
                <a  href="detail.php?id=<?= $article['id_articulo'] ?>">
                    <?= $article['titulo'] ?>
                </a>
                <span class='' onclick='window.location.href="actualizarArticle.php?id=<?= $article["id_articulo"] ?>"'>✏️</span>
                <span class='' onclick='deleteArticle(<?= $article["id_articulo"] ?>)'>X</span>
            </li>
        <?php endforeach; ?>


    <?php else : ?>
        <p>Todavia no ha registrados articulos</p>
            
    <?php endif; ?>




</ul>
<div id="modal" class=" hidden fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50" onclick="cancelDeleteArticle()">
  <div id="modal-content" class="h-auto w-auto flex-col rounded-lg bg-white p-4 " onclick="event.stopPropagation()">
    <p class="mx-4 mb-5 mt-2 flex h-auto items-center justify-center text-center text-sm text-stone-900">¿Desea eliminar el articulo?</p>
    <div class="flex h-1/3 items-end justify-center gap-2">
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#4F6D7A] hover:text-white" onclick="cancelDeleteArticle()">Cancelar</button>
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#f73a3a] hover:text-white" onclick="confirmDeleteArticle()">Eliminar</button>
    </div>
  </div>
</div>
<?php
    if (isset($_SESSION['errorarticle'])) {
        unset($_SESSION['errorarticle']);
    }
    if (isset($_SESSION['successarticle'])) {
        unset($_SESSION['successarticle']);
    }
   

?>

<?php require_once "components/footer.php"; ?>
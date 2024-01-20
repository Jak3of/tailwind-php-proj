<?php 
    session_start(); // Iniciar una nueva sesión siempre
if (!isset($_SESSION['user'])) { 
    $errorlogin = array(); 
    $errorlogin['login']  = "Debes iniciar sesion primero!";
    $_SESSION['erroreslogin'] = $errorlogin;
    header('Location: ./'); 
    exit(); // Terminar la ejecucion para que no ejecute mas codigo
}

if (!isset($_GET['id'])) {
    header('Location: ./'); 
    exit();
}

$id = $_GET['id'];
require_once 'request/helper.php';

$articulo = getArticleforuser($id);
if ($articulo == null) {
    header('Location: ./'); 
    exit();
}
require_once "components/header.php"; 
?>


<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php 
    
    (isset($_SESSION['erroractualizar'])) ? $erroractualizar = $_SESSION['erroractualizar'] : '';
    (isset($_SESSION['successactualizar'])) ? $successactualizar = $_SESSION['successactualizar'] : '';
    (isset($_SESSION['erroresactualizar'])) ? $erroresactualizar = $_SESSION['erroresactualizar'] : '';
    
?>

<h1>Actualizar Articulo:</h1>
<p class="text-[#4F6D7A] text-sm">
    Puedes actualizar tus articulos de la base de datos.
</p>

<?= (isset($successactualizar)) ? helper($successactualizar, 'success') : '' ?>
<?= (isset($erroractualizar)) ? helper($erroractualizar, 'warning') : '' ?>

<form action="request/q_article_actualizar.php?id=<?= $articulo['id_articulo'] ?>" method="post" class="
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
    <input class="mb-1" type="text" name="title" placeholder="Ingrese el nombre" id="title" value="<?= $articulo['titulo'] ?>">

    <?= (isset($erroresactualizar['title'])) ? helper($erroresactualizar['title'], 'danger-text') : '' ?>

    <label class="text-[#4F6D7A] text-sm" for="description" class="">Descripción:</label>
    <input class="mb-1" type="text" name="description" placeholder="Ingrese la descripción" id="description" value="<?= $articulo['descripcion'] ?>">

    <?= (isset($erroresactualizar['description'])) ? helper($erroresactualizar['description'], 'danger-text') : '' ?>

    <label class="text-[#4F6D7A] text-sm" for="category" class="">Categoría:</label>
    <select class="mb-1" name="category" id="category" >
        <?php
            $categories = getCategories();
            if (!empty($categories)) :
            foreach ($categories as $category) :
                ?>

                <option <?= ($category['id_categoria'] == $articulo['id_categoria']) ? 'selected' : '' ?>  value='<?= $category['id_categoria'] ?>'><?= $category['nombre'] ?></option>

        <?php endforeach; 
            endif;
            ?>
    </select>

    <?= (isset($erroresactualizar['category'])) ? helper($erroresactualizar['category'], 'danger-text') : '' ?>

    <label class="text-[#4F6D7A] text-sm mb-2" for="content" class="">Contenido:</label>

    <?= (isset($erroresactualizar['content'])) ? helper($erroresactualizar['content'], 'danger-text') : '' ?>
    
    <textarea class="w-full h-40 my-1" name="content" id="content" ><?= $articulo['noticia'] ?></textarea>
    
    
    
    <input class="hover:bg-[#4F6D7A] hover:text-white transition-all duration-200 cursor-pointer hover:translate-y-[2px] hover:translate-x-[-2px]" type="submit" value="Actualizar">
</form>
<p>Tambien puede eliminar el articulo:
    
    <button class="w-full bg-[#f73a3a] text-white p-1 rounded-lg border border-slate-500 hover:bg-[#4F6D7A] hover:text-white transition-all duration-200 cursor-pointer hover:translate-y-[2px] hover:translate-x-[-2px]" onclick="deleteArticle(<?= $articulo['id_articulo'] ?>)">Eliminar</button>
</p>


    <!--listactualizarsall(); -->
    





</ul>
<div id="modal" class=" hidden fixed z-60 left-0 top-0 flex h-screen w-screen items-center justify-center bg-black bg-opacity-50" onclick="cancelDeleteArticle()">
  <div id="modal-content" class="h-auto w-auto flex-col rounded-lg bg-white p-4 " onclick="event.stopPropagation()">
    <p class="mx-4 mb-5 mt-2 flex h-auto items-center justify-center text-center text-sm text-stone-900">¿Desea eliminar el articulo?</p>
    <div class="flex h-1/3 items-end justify-center gap-2">
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#4F6D7A] hover:text-white" onclick="cancelDeleteArticle()">Cancelar</button>
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#f73a3a] hover:text-white" onclick="confirmDeleteArticle()">Eliminar</button>
    </div>
  </div>
</div>
<?php
    if (isset($_SESSION['erroractualizar'])) {
        unset($_SESSION['erroractualizar']);
    }
    if (isset($_SESSION['successactualizar'])) {
        unset($_SESSION['successactualizar']);
    }
    if (isset($_SESSION['erroresactualizar'])) {
        unset($_SESSION['erroresactualizar']);
        
    }
    if (isset($_SESSION['successactualizar'])) {
        unset($_SESSION['successactualizar']);
    }

?>

<?php require_once "components/footer.php"; ?>
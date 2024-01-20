<?php 
session_start();
if (!isset($_SESSION['user'])) { 
    $errorlogin = array();
    $errorlogin['login']  = "Debes iniciar sesion primero!";
    $_SESSION['erroreslogin'] = $errorlogin;
    header('Location: ./'); 
    exit();
}

require_once "components/header.php"; 
?>


<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<?php 
    (isset($_SESSION['errorcategory'])) ? $errorcategory = $_SESSION['errorcategory'] : '';
    (isset($_SESSION['successcategory'])) ? $successcategory = $_SESSION['successcategory'] : '';

?>

<h1>Crear categoria:</h1>
<p class="text-[#4F6D7A] text-sm">
    Puede agregar una nueva categoria a la base de datos.
</p>

<?= (isset($successcategory)) ? helper($successcategory, 'success') : '' ?>
<form action="request/q_category.php" method="post" class="
    [&>*]:w-full 
    [&>input]:text-[#4F6D7A] [&>input]:rounded-lg [&>input]:border [&>input]:border-[#4F6D7A]
    [&>input]:p-1 [&>input]:placeholder:text-[#4F6D7A] [&>input]:placeholder:text-sm
    [&>input]:mt-2 [&>input]:shadow-sm [&>input]:shadow-[#4F6D7A]
    [&>input]:focus:outline-none
    ">
    <label class="text-[#4F6D7A] text-sm" for="name" class="">Nombre de la categoria:</label>
    <input class="mb-1" type="text" name="name" placeholder="Ingrese el nombre" id="name">
    <?= (isset($errorcategory)) ? helper($errorcategory, 'danger-text') : '' ?>
    <input class="hover:bg-[#4F6D7A] hover:text-white transition-all duration-200 cursor-pointer hover:translate-y-[2px] hover:translate-x-[-2px]" type="submit" value="Agregar">
</form>

<h1>Lista de categorias:</h1>
<ul class="flex flex-col gap-2 w-full text-[#4F6D7A] text-sm p-2 border border-[#4F6D7A] rounded-lg 
    [&>li]:w-full [&>li]:flex [&>li]:justify-stretch
    [&>li>*]:p-1 [&>li>*]:border [&>li>*]:border-[#4F6D7A] [&>li>*]:shadow 
    [&>li>a]:w-[90%] [&>li>span]:w-[10%] [&>li>a]:rounded-l-lg [&>li>span]:rounded-r-lg
    [&>li>span]:flex [&>li>span]:justify-center [&>li>span]:items-center [&>li>span]:text-xl
    [&>li>a]:flex [&>li>a]:items-center [&>li>a]:border-r-0
    [&>li>*]:cursor-pointer [&>li>*:hover]:text-white [&>li>*:hover]:bg-[#4F6D7A]">
    <?= listCategories(true); ?>

</ul>
<div id="modal" class=" hidden fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50" onclick="cancelDeleteCategory()">
  <div id="modal-content" class="h-auto w-auto flex-col rounded-lg bg-white p-4 " onclick="event.stopPropagation()">
    <p class="mx-4 mb-5 mt-2 flex h-auto items-center justify-center text-center text-sm text-stone-900">¿Desea eliminar la categoria?</p>
    <div class="flex h-1/3 items-end justify-center gap-2">
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#4F6D7A] hover:text-white" onclick="cancelDeleteCategory()">Cancelar</button>
      <button class="cursor-pointer rounded-lg border border-slate-500 bg-slate-300 p-1 transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[2px] hover:bg-[#f73a3a] hover:text-white" onclick="confirmDeleteCategory()">Eliminar</button>
    </div>
  </div>
</div>
<?php
    if (isset($_SESSION['errorcategory'])) {
        unset($_SESSION['errorcategory']);
    }
    if (isset($_SESSION['successcategory'])) {
        unset($_SESSION['successcategory']);
    }

?>

<?php require_once "components/footer.php"; ?>
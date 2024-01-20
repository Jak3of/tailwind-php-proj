<?php 
    session_start(); // Iniciar una nueva sesión siempre
if (!isset($_SESSION['user'])) { 
    $errorlogin = array(); 
    $errorlogin['login']  = "Debes iniciar sesion primero!";
    $_SESSION['erroreslogin'] = $errorlogin;
    header('Location: ./'); 
    exit(); // Terminar la ejecucion para que no ejecute mas codigo
} 
    $userS = $_SESSION['user'];

    (isset($_SESSION['erroractualizar'])) ? $erroractualizar = $_SESSION['erroractualizar'] : '';
    (isset($_SESSION['successactualizar'])) ? $successactualizar = $_SESSION['successactualizar'] : '';
    (isset($_SESSION['erroresactualizar'])) ? $erroresactualizar = $_SESSION['erroresactualizar'] : '';
    
require_once "components/header.php"; 
?>


    


<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>

<h1>
    Mis datos
</h1>

<form action="request/q_profile.php" method="post" class="
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
    [&>input]:focus:outline-none">
    <?= (isset($successactualizar)) ? helper($successactualizar, 'success') : '' ?>
    <?= (isset($erroractualizar)) ? helper($erroractualizar, 'warning') : '' ?>
    
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?= $userS['name'] ?>">
    <?= (isset($erroresactualizar['name'])) ? helper($erroresactualizar['name'], 'warning') : '' ?>

    <label for="surname">Apellidos:</label> 
    <input type="text" name="surname" id="surname" value="<?= $userS['surname'] ?>">
    <?= (isset($erroresactualizar['surname'])) ? helper($erroresactualizar['surname'], 'warning') : '' ?>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $userS['email'] ?>">
    <?= (isset($erroresactualizar['email'])) ? helper($erroresactualizar['email'], 'warning') : '' ?>

    <input class="hover:bg-[#4F6D7A] hover:text-white transition-all duration-200 cursor-pointer hover:translate-y-[2px] hover:translate-x-[-2px]" type="submit" value="Actualizar">






</form>

<?php
    if (isset($_SESSION['erroractualizar'])) {
        unset($_SESSION['erroractualizar']);
    }
    if (isset($_SESSION['successactualizar'])) {
        unset($_SESSION['successactualizar']);
    }

?>

<?php require_once "components/footer.php"; ?>
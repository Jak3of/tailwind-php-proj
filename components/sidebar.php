<?php

(isset($_SESSION['errores'])) ? $errores = $_SESSION['errores'] : '';
(isset($_SESSION['register'])) ? $register = $_SESSION['register'] : '';
(isset($_SESSION['login'])) ? $login = $_SESSION['login'] : '';
(isset($_SESSION['erroreslogin'])) ? $erroreslogin = $_SESSION['erroreslogin'] : '';
(isset($_SESSION['user'])) ? $user = $_SESSION['user'] : '';
?>

<main class="flex-grow ">
    <div id="container" class="mt-20 mb-4 container mx-auto grid grid-cols-1 auto-rows-min
    sm:grid-cols-3 sm:grid-rows-1 gap-2 lg:gap-4">
        <aside id="sidebar" class="col-start-1 col-end-2 row-start-1 row-end-2 sm:col-start-3 
        sm:col-end-4 sm:row-start-1 sm:row-end-2 
         ">
            <div
                class="mx-2 mb-5 mt-3 h-fit w-5/6 mx-auto overflow-hidden text-ellipsis rounded-2xl bg-[#4A6FA5] p-5 text-[#287088] shadow-lg shadow-gray-600 sm:mx-auto sm:w-full lg:w-5/6">
                <form class="relative w-full pl-7" onsubmit="event.preventDefault(); window.location.href='search.php?search='+this.elements.search.value;">
                    <input class="w-full rounded-md p-2" type="search" name="search" placeholder="Buscar"
                        autocomplete="off" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
                    <span class="absolute left-0 top-2 -translate-y-0.5 cursor-pointer"
                        onclick="window.location.href='search.php?search='+this.previousElementSibling.value'">🔎</span>
                </form>
            </div>

            <?= (isset($register)) ? helper($register, 'success') : '' ?>
            <?= (isset($login)) ? helper($login, 'success') : '' ?>
            <?= (isset($erroreslogin['sqllogin'])) ? helper($erroreslogin['sqllogin'], 'warning') : '' ?>
            <?= (isset($erroreslogin['login'])) ? helper($erroreslogin['login'], 'warning') : '' ?>
            <?php if (!isset($_SESSION['user'])): ?>
                <div class="mb-5 bg-[#4A6FA5] text-[#DBE9EE] shadow-lg shadow-gray-600 p-5 
        rounded-2xl mx-2 sm:mx-auto w-5/6 sm:w-full lg:w-5/6 mx-auto h-fit text-ellipsis overflow-hidden mt-3 ">
                <div id="login" class="mb-5">
                    <h3 class="fajala text-center"> Identificate</h3>
                    <form action="request/login.php" method="post" class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50 
                    [&>input]:mb-3 [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">
                        <label for="email">Email:</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="email" name="email"
                            placeholder="miemail@email.com">
                        <?= (isset($erroreslogin['email'])) ? helper($erroreslogin['email'], 'danger-text') : '' ?>
                        <label for="password">Contraseña:</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password"
                            placeholder="Contraseña">
                        <?= (isset($erroreslogin['password'])) ? helper($erroreslogin['password'], 'danger-text') : '' ?>
                        <input
                            class="bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg"
                            type="submit" value="Entrar">
                    </form>
                </div>

                <div id="register" class=" mb-5 ">
                    <h3 class="fajala text-center">Registrate</h3>
                    <form action="request/register.php" method="post" class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50 [&>label]:mt-3
                    [&>input]: [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">
                        <?= (isset($errores['register'])) ? helper($errores['register'], 'danger-text') : '' ?>

                        <label for="name">Nombre</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="text" name="name" placeholder="Nombre">
                        <?= (isset($errores['name'])) ? helper($errores['name'], 'danger-text') : '' ?>
                        <label for="surname">Apellidos</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="text" name="surname" placeholder="Apellidos">
                        <?= (isset($errores['surname'])) ? helper($errores['surname'], 'danger-text') : '' ?>
                        <label for="email">Email</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="email" name="email"
                            placeholder="miemail@email.com">
                        <?= (isset($errores['email'])) ? helper($errores['email'], 'danger-text') : '' ?>
                        <label for="password">Contraseña</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password"
                            placeholder="Contraseña">
                        <?= (isset($errores['password'])) ? helper($errores['password'], 'danger-text') : '' ?>
                        <label for="password_confirmation">Repite la contraseña</label>
                        <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password_confirmation"
                            placeholder="Contraseña">
                        <?= (isset($errores['password_confirmation'])) ? helper($errores['password_confirmation'], 'danger-text') : '' ?>

                        <input
                            class=" bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg"
                            type="submit" value="Registrese">


                    </form>
                </div>
                </div>
            <?php else: ?>
                <!-- si esta logueado -->
                <div class="mb-5 bg-[#4A6FA5] text-[#DBE9EE] shadow-lg shadow-gray-600 p-5 
        rounded-2xl mx-2 sm:mx-auto w-5/6 sm:w-full lg:w-5/6 mx-auto h-fit text-ellipsis overflow-hidden mt-3 ">
                    <p class="fajala text-2xl text-center capitalize">Hola,
                        <?= $_SESSION['user']['name'] ?>. Bienvenido

                    </p>
                    <div id="options" class="flex flex-col justify-center items-start w-full gap-2 mt-3">
                        <a href="article.php"
                            class="mb-5 p-2 text-center w-full rounded-2xl  bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg">Añadir
                            articulo</a>
                        <a href="catergory.php"
                            class="mb-5 p-2 rounded-2xl w-full text-center  bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg">Añadir
                            categorías</a>
                        <a href="profile.php"
                            class="mb-5 p-2 rounded-2xl w-full text-center  bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg">Mis
                            Datos</a>
                        <a href="request/logout.php"
                            class="p-2 rounded-2xl w-full text-center  bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg">Cerrar
                            sesión</a>

                    </div>
                </div>
            <?php endif;
            ?>

        </aside>

        <?php
        if (isset($errores)) {
            unset($_SESSION['errores']);

        }
        if (isset($register)) {
            unset($_SESSION['register']);
        }
        if (isset($login)) {
            unset($_SESSION['login']);
        }
        if (isset($erroreslogin)) {
            unset($_SESSION['erroreslogin']);
        }



        ?>
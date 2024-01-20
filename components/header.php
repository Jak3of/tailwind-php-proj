<?php
 if (!isset($_SESSION)) {
    session_start();
}
require_once 'request/helper.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>

</head>

<body class="bg-[#C0D6DF] flex flex-col min-h-screen ">

    <header class=" bg-[#166088] text-gray-100 w-full h-14 fixed top-0 left-0 right-0 z-50 shadow-2xl">
        <div class="container mx-auto flex flex-row items-center justify-around h-full px-4  ">
            <div id=logo class="flex flex-col items-center justify-start ">
                <a class="flex items-center" href="index.php">
                    <h1
                        class="fajala text-3xl font-bold text-[#C0D6DF] [text-shadow:_1px_1px_0px_black,_2px_2px_0px_black]">
                        Blog de Videojuegos</h1>
                </a>
            </div>
            <nav class="flex flex-grow justify-end h-full ">
                <ul class="hidden absolute inset-0 h-screen flex flex-col items-center justify-center w-screen bg-gray-500
            [&>li]:py-2 [&>li]:text-lg [&>li]:font-bold [&>li]:px-2 
            lg:flex lg:justify-end lg:items-center [&>li>a]:text-white
            [&>li]:lg:w-full [&>li]:lg:h-full [&>li]:lg:flex [&>li]:items-center [&>li]:justify-center
            [&>li>a]:lg:p-3 [&>li>a]:items-center [&>li>a]:justify-center [&>li>a]:lg:flex 
            lg:h-auto lg:w-auto lg:static lg:flex-row lg:bg-transparent 
            [&>li>a]:lg:whitespace-nowrap [&>li>a]:h-full" id="sidebar">
                    <li class="hover:bg-[#4F6D7A]"><a href="index.php">Inicio</a></li>
                    <li class="relative group/inner inline-block ">
                        <a href="articles.php" id="boton-submenu" class="hidden lg:block">Categorias</a>
                        <ul class="flex lg:hidden lg:group-hover/inner:flex lg:rounded-b-lg
                        p-0 lg:m-0 lg:mt-0 lg:bg-[#4A6FA5]
                        lg:absolute lg:top-14 lg:left-0 
                        lg:justify-end items-center lg:flex w-full flex-col 
                        [&>li]:py-2 [&>li]:lg:text-lg [&>li>a]:text-slate-200 [&>li:hover]:bg-[#4F6D7A] 
                        [&>li:last-child:hover]:lg:rounded-b-lg
                        [&>li]:w-full [&>li]:lg:h-full [&>li]:flex [&>li]:items-center [&>li]:justify-center
                        [&>li>a]:whitespace-nowrap [&>li:hover]:bg-[#4F6D7A] " id="submenu">
                            <?= listCategories2() ?>
                        </ul>
                    </li>


                    <li class="hover:bg-[#4F6D7A]"><a href="aboutme.php">Sobre mi</a></li>
                    <li class="hover:bg-[#4F6D7A]"><a href="contact.php">Contacto</a></li>
                </ul>
                <div id="boton-menu" class="lg:hidden bg-transparent text-black p-2 cursor-pointer ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <div id="boton-menu-close"
                    class="hidden bg-transparent p-2 cursor-pointer text-black absolute top-0 right-0 z-50 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

            </nav>
        </div>
    </header>
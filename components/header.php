<script>

    document.addEventListener("DOMContentLoaded", function (event) {

        document.getElementById("boton-menu").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("hidden")
            document.getElementById("boton-menu-close").classList.toggle("hidden")
        })
        document.getElementById("boton-menu-close").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("hidden")
            document.getElementById("boton-menu-close").classList.toggle("hidden")
        })

        document.getElementById("boton-submenu").addEventListener("click", function () {

            document.getElementById("submenu").classList.toggle("hidden")

        })





    })

</script>
<header class=" bg-[#166088] text-gray-100 w-full h-14 fixed top-0 left-0 right-0 z-50 shadow-2xl">
    <div class="container mx-auto flex flex-row items-center justify-around h-full ">
        <div id=logo class="flex flex-col items-center justify-start ">
            <a class="flex items-center" href="index.php">
                <h1 class="fajala text-3xl font-bold text-[#C0D6DF] [text-shadow:_1px_1px_0px_black,_2px_2px_0px_black]">
                    Blog de Videojuegos</h1>
            </a>
        </div>
        <nav class="flex flex-grow justify-end h-full ">
            <ul class="hidden absolute inset-0 h-screen flex flex-col items-center justify-center w-screen bg-gray-500
            [&>li]:py-2 [&>li]:text-lg [&>li]:font-bold [&>li]:px-2 
            sm:flex sm:justify-end sm:items-center [&>li>a]:text-white
            [&>li]:sm:w-full [&>li]:sm:h-full [&>li]:sm:flex [&>li]:items-center [&>li]:justify-center
            [&>li>a]:sm:p-3 [&>li>a]:items-center [&>li>a]:justify-center [&>li>a]:sm:flex 
            sm:h-auto sm:w-auto sm:static sm:flex-row sm:bg-transparent 
            [&>li>a]:sm:whitespace-nowrap [&>li>a]:h-full" id="sidebar">
                <li class="hover:bg-[#4F6D7A]"><a href="index.php">Inicio</a></li>
                <li class="relative group/inner inline-block ">
                    <a href="#" id="boton-submenu" class="hidden sm:block">Categorias</a>
                    <ul class="flex sm:hidden sm:group-hover/inner:flex sm:rounded-b-lg
                        p-0 sm:m-0 sm:mt-0 sm:bg-[#4A6FA5]
                        sm:absolute sm:top-14 sm:left-0 
                        sm:justify-end items-center sm:flex w-full flex-col 
                        [&>li]:py-2 [&>li]:sm:text-lg [&>li>a]:text-slate-200 [&>li:hover]:bg-[#4F6D7A] 
                        [&>li:last-child:hover]:sm:rounded-b-lg
                        [&>li]:w-full [&>li]:sm:h-full [&>li]:flex [&>li]:items-center [&>li]:justify-center
                        [&>li>a]:whitespace-nowrap " 
                        id="submenu">
                        <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 1</a></li>
                        <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 2</a></li>
                        <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 3</a></li>
                        <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 4</a></li>
                    </ul>
                </li>


                <li class="hover:bg-[#4F6D7A]"><a href="index.php">Sobre mi</a></li>
                <li class="hover:bg-[#4F6D7A]"><a href="index.php">Contacto</a></li>
            </ul>
            <div id="boton-menu" class="sm:hidden bg-transparent text-black p-2 cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <div id="boton-menu-close"
                class="hidden bg-transparent p-2 cursor-pointer text-black absolute top-0 right-0 z-50 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

        </nav>
    </div>
</header>
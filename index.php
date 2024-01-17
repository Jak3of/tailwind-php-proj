<?php
    session_start();
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
    <?php require_once "components/header.php"; ?>

    <main class="flex-grow">
    <div id="container" class="mt-20 container mx-auto grid grid-cols-1 grid-rows-2  sm:grid-cols-3 sm:grid-rows-2 gap-2 lg:gap-4">

        <?php require_once "components/sidebar.php"; ?>



        <?php require_once "components/content.php"; ?>



    </div>

    </main>
    <?php require_once "components/footer.php"; ?>



</body>

</html>
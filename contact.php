<?php require_once "components/header.php"; ?>



<?php require_once "components/sidebar.php"; ?>



<?php require_once "components/contentHeader.php"; ?>



<h1>Contactame:</h1>

<form action="" method="post" class="
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


    <label for="name">Nombre</label>
    <input class="mb-1" type="text" name="name" id="name">

    <label for="email">Email</label>
    <input class="mb-1" type="email" name="email" id="email">

    <label for="subject">Asunto</label>
    <input class="mb-1" type="text" name="subject" id="subject">

    <label for="message">Mensaje</label>
    <textarea class="mb-1" name="message" id="message"></textarea>

</form>



<?php require_once "components/footer.php"; ?>
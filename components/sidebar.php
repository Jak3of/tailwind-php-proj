

<aside id="sidebar" class="col-start-1 col-end-2 row-start-1 row-end-2 sm:col-start-3 sm:col-end-4 sm:row-start-1 sm:row-end-3 
        bg-[#4A6FA5] text-[#DBE9EE] shadow-lg shadow-black p-5 rounded-2xl mx-2 sm:mx-auto w-5/6 sm:w-full lg:w-5/6 mx-auto " >
            <div id="login" >
                <h3 class="fajala text-center"> Identificate</h3>
                <form action="request/login.php" method="post"
                    class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50 
                    [&>input]:mb-3 [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">
                    <label for="email" >Email:</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="email" name="email" placeholder="miemail@email.com">
                    <label for="password">Contraseña:</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password" placeholder="Contraseña">
                    <input class="bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg" type="submit" value="Entrar">
                </form>
            </div>
            <div id="register" class="mt-10 ">
                <h3 class="fajala text-center">Registrate</h3>
                <form action="request/register.php" method="post"
                    class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50 
                    [&>input]:mb-3 [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">

                    <?php include 'helper.php';
                        
                        if (isset($_SESSION['errores'])) { 
                            $errores = $_SESSION['errores']; 
                            echo var_dump($_SESSION['errores']);
                        }
                     ?>
                    <label for="name">Nombre</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]"  type="text" name="name" placeholder="Nombre">
                    <?php if (isset($errores['name'])) { echo helper($errores['name'], 'red'); } ?>
                    <label for="surname">Apellidos</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]"  type="text" name="surname" placeholder="Apellidos">
                    <?php if (isset($errores['surname'])) { echo helper($errores['surname'], 'red'); } ?>
                    <label for="email">Email</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="email" name="email" placeholder="miemail@email.com">
                    <?php if (isset($errores['email'])) { echo helper($errores['email'], 'red'); } ?>
                    <label for="password">Contraseña</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password" placeholder="Contraseña">
                    <?php if (isset($errores['password'])) { echo helper($errores['password'], 'red'); } ?>
                    <label for="password_confirmation">Repite la contraseña</label>
                    <input class="bg-[#C0D6DF] text-[#4F6D7A]" type="password" name="password_confirmation" placeholder="Contraseña">
                    <?php if (isset($errores['password_confirmation'])) { echo helper($errores['password_confirmation'], 'red'); } ?>
                    
                    <input class=" bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg" type="submit" value="Registrese">
                    

                </form>
            </div>
        </aside>
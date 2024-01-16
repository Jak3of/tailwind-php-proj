<aside id="sidebar" class="col-start-1 col-end-2 row-start-1 row-end-2 sm:col-start-3 sm:col-end-4 sm:row-start-1 sm:row-end-3 
        bg-[#4A6FA5] text-[#DBE9EE] shadow-lg shadow-black p-5 rounded-2xl mx-2 sm:mx-auto w-5/6 sm:w-full lg:w-5/6 mx-auto " >
            <div id="login" >
                <h3 class="fajala text-center"> Identificate</h3>
                <form action="login.php" method="post"
                    class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50
                    [&>input]:mb-3 [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">
                    <label for="email" >Email:</label>
                    <input class="bg-[#C0D6DF]" type="email" name="email" placeholder="miemail@email.com">
                    <label for="password">Contraseña:</label>
                    <input class="bg-[#C0D6DF]" type="password" name="password" placeholder="Contraseña">
                    <input class="bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg" type="submit" value="Entrar">
                </form>
            </div>
            <div id="register" class="mt-10 ">
                <h3 class="fajala text-center">Registrate</h3>
                <form action="register.php" method="post"
                    class="flex flex-col justify-center items-center gap-2 mt-3 [&>*]:w-full 
                    [&>input]:p-1 [&>input]:border [&>input]:border-gray-400 [&>input]:rounded-xl
                    [&>input]:outline-none [&>input]:focus:ring-1 [&>input]:focus:ring-blue-400
                    [&>input]:focus:ring-opacity-50
                    [&>input]:mb-3 [&>input]:shadow-lg [&>input]:placeholder-[#4F6D7A]">
                    <label for="name">Nombre</label>
                    <input class="bg-[#C0D6DF]" type="text" name="name" placeholder="Nombre">
                    <label for="surname">Apellidos</label>
                    <input class="bg-[#C0D6DF]" type="text" name="surname" placeholder="Apellidos">
                    <label for="email">Email</label>
                    <input class="bg-[#C0D6DF]" type="email" name="email" placeholder="miemail@email.com">
                    <label for="password">Contraseña</label>
                    <input class="bg-[#C0D6DF]" type="password" name="password" placeholder="Contraseña">
                    <input class=" bg-[#4F6D7A] hover:bg-[#DBE9EE] hover:text-[#4F6D7A] cursor-pointer text-[#DBE9EE] border-none shadow-lg" type="submit" value="Registrese">
                </form>
            </div>
        </aside>
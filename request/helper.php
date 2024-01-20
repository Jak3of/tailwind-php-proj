<?php
require_once(realpath(__DIR__ . '/../config/conection.php'));
function helper($message, $class = '')
{
    $gotoicon = 'relative text-lg font-bold m-auto';
    $gotoclass = 'rounded-xl p-2 text-sm text-start mb-3 shadow-lg shadow-gray-600 animate-bounce';
    $final = '</div>';
    $iconclassarray = array(
        'danger' => ['text-red-800', 'bg-red-500 text-red-900'],
        'warning' => ['text-yellow-800', 'bg-yellow-500 text-yellow-900'],
        'success' => ['text-green-800', 'bg-green-500 text-green-900'],
        'info' => ['text-blue-800', 'bg-blue-500 text-blue-900'],
        'danger-text' => ['text-red-900', 'bg-red-500 text-red-900 pl-4 font-bold', 'rounded-xl px-2 text-sm text-start'],
        '' => 'bg-gray-600 text-gray-100'
    );
    !isset($iconclassarray[$class][2]) ? $final = "<span class='absolute top-0 right-1 text-xl cursor-pointer' onclick='this.parentElement.style.display=\"none\";'>&times;</span></div>" : '';
    $gotoclass = $iconclassarray[$class][2] ?? $gotoclass;
    $alert = "<div class=' " . $iconclassarray[$class][1] . " $gotoclass'><i class=' " . $iconclassarray[$class][0] . " $gotoicon '>!</i> $message $final";
    return $alert;
}

function listCategories($close)
{
    global $conn;
    $sql = "SELECT * FROM categorias WHERE activo = 1";
    $result = mysqli_query($conn, $sql);

    $categories = '';
    if ($result->num_rows > 0) {
        // <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 1</a></li>
        while ($row = $result->fetch_assoc()) {
            $categories .= "<li class='relative '><a href='category.php?id=" . $row['id_categoria'] . "'>" . $row['nombre'] . "</a>";
            if (isset($close))
                $categories .= "<span class='' onclick='deleteCategory(" . $row['id_categoria'] . ")'>&times;</span>";
            $categories .= "</li>";
        }
        return $categories;
    } else {
        $categories = '<li class="hover:bg-[#4F6D7A]"><a href="./">Not Found</a></li>';
        return $categories;
    }
}


function listArticles($limit = 3)
{
    global $conn;
    $sql = "SELECT c.*, u.name as name , u.surname as surname FROM articulos as c inner join users as u on c.id_users = u.id_users  where c.activo = 1 ORDER BY id_articulo DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);
    $articles = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $articles .= "<article ><h2>" . $row['titulo'] . "</h2>
                <p class='text-sm text-[#4A6FA5] '>Hecho por: 
                <span class='font-bold text-[#4A6FA5]'>" . $row['name'] . " " . $row['surname'] . "</span></p>
                <p>
                    " . $row['descripcion'] . "
                    <a href='detail.php?id=" . $row['id_articulo'] . "' class='text-[#4A6FA5] hover:text-[#4F6D7A]'>Leer mas</a>
                </p>
                </article>";
        }
        return $articles;
    } else {
        $articles = '<p>No hay articulos</p>';
        return $articles;
    }
}

function listArticlesLasted($limit = 3)
{
    global $conn;
    $sql = "SELECT c.*, u.name as name , u.surname as surname FROM articulos as c inner join users as u on c.id_users = u.id_users where c.activo = 1 ORDER BY id_articulo DESC LIMIT $limit ";
    $result = mysqli_query($conn, $sql);
    $articles = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles .= "<article ><h2>" . $row['titulo'] . "</h2>
                <p class='text-sm text-[#4A6FA5] '>Hecho por: 
                <span class='font-bold text-[#4A6FA5]'>" . $row['name'] . " " . $row['surname'] . "</span></p>
                <p>
                    " . $row['descripcion'] . "
                    <a href='detail.php?id=" . $row['id_articulo'] . "' class='text-[#4A6FA5] hover:text-[#4F6D7A]'>Leer mas</a>
                </p>
                </article>";
        }
        return $articles;
    } else {
        $articles = '<p>No hay articulos</p>';
        return $articles;
    }


}


function listCategories2()
{
    global $conn;
    $sql = "SELECT * FROM categorias WHERE activo = 1";
    $result = mysqli_query($conn, $sql);

    $categories = '';
    if ($result->num_rows > 0) {
        // <li class="hover:bg-[#4F6D7A]"><a href="index.php">Categoria 1</a></li>
        while ($row = $result->fetch_assoc()) {
            ?>
            <li class='hover:bg-[#4F6D7A]'><a href='categories.php?id=<?= $row['id_categoria'] ?>'>
                    <?= $row['nombre'] ?>
                </a></li>
            <?php
        }
    } else {
        ?>
        <li class="hover:bg-[#4F6D7A]"><a href="./">Not Found</a></li>
        <?php
    }
}



function listArticlesLasted2($limit = null)
{
    global $conn;
    $sql = "SELECT c.*, u.name as name , u.surname as surname, a.nombre as categoria FROM articulos as c inner join users as u on u.id_users = c.id_users INNER JOIN categorias as a on a.id_categoria = c.id_categoria where c.activo = 1 ORDER BY id_articulo desc ";
    ($limit != null) ? $sql .= " LIMIT $limit;" : $sql .= ";";
    $result = mysqli_query($conn, $sql);
    $articles = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <article>
                <h2>
                    <?= $row['titulo'] ?>
                </h2>
                <p class='text-sm text-[#4A6FA5] '>
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $row['categoria'] ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= date('d/m/Y', strtotime($row['fecha'])) ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $row['name'] ?>
                        <?= $row['surname'] ?>
                    </span>
                </p>
                <p>
                    <?= $row['descripcion'] ?>
                    <a href='detail.php?id=<?= $row['id_articulo'] ?>' class='text-[#4A6FA5] hover:text-[#4F6D7A]'>Leer mas</a>
                </p>
            </article>
            <?php
        }
    } else {
        ?>
        <article>
            <h2 class='text-center text-[#4A6FA5] font-bold'>No hay artículos</h2>

        </article>
        <?php
    }
}


function listArticlesforCategory2($id)
{
    global $conn;
    $sql = "SELECT c.*, u.name as name , u.surname as surname, a.nombre as categoria FROM articulos as c inner join users as u on u.id_users = c.id_users INNER JOIN categorias as a on a.id_categoria = c.id_categoria where c.activo = 1 ";

    $sql .= "AND c.id_categoria = ? ORDER BY id_articulo desc;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <article>
                <h2>
                    <?= $row['titulo'] ?>
                </h2>
                <p class='text-sm text-[#4A6FA5] '>
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $row['categoria'] ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= date('d/m/Y', strtotime($row['fecha'])) ?>
                    </span> |
                    <span class='font-bold text-[#4A6FA5]'>
                        <?= $row['name'] ?>
                        <?= $row['surname'] ?>
                    </span>
                </p>
                <p>
                    <?= $row['descripcion'] ?>
                    <a href='detail.php?id=<?= $row['id_articulo'] ?>' class='text-[#4A6FA5] hover:text-[#4F6D7A]'>Leer mas</a>
                </p>
            </article>
            <?php
        }
    } else {


        ?>
        <article>
            <h2 class='text-[#4A6FA5] font-bold'>No hay artículos sobre la categoría.</h2>

        </article>
        <?php

    }

}



function getCategories($id = null)
{
    global $conn;
    $sql = "SELECT * FROM categorias WHERE activo = 1";
    ($id != null) ? $sql .= " AND id_categoria = $id;" : $sql .= ";";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function listArticlesall($id = null)
{
    global $conn;
    $sql = "SELECT * FROM articulos WHERE activo = 1";
    ($id != null) ? $sql .= " AND id_users = $id ORDER BY id_articulo desc;" : $sql .= " ORDER BY id_articulo desc;";
    $result = mysqli_query($conn, $sql);
    return $result;

}

function listArticlesforCategory($id)
{
    global $conn;
    $sql = "SELECT * FROM articulos WHERE activo = 1 AND id_categoria = $id ORDER BY id_articulo desc;";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getArticle($id)
{
    global $conn;
    $sql = "SELECT c.*, u.name as name , u.surname as surname, a.nombre as categoria FROM articulos as c 
    inner join users as u on u.id_users = c.id_users INNER JOIN categorias as a on a.id_categoria = c.id_categoria 
    where c.activo = 1 AND c.id_articulo = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
            <h1 class="text-center mb-6">
                <?= $row['titulo'] ?>
            </h1>
        <article>
            <p class='text-sm text-[#4A6FA5] '>
                <span class='font-bold text-[#4A6FA5] text-end'>
                    Autor:
                    <?= $row['name'] ?>
                    <?= $row['surname'] ?>
                </span> |
                <span class='font-bold text-[#4A6FA5]'>
                    <?= date('d/m/Y', strtotime($row['fecha'])) ?>
                </span>

            </p>
            <div class="mb-4 text-sm">
                <span class='font-bold text-[#4A6FA5]'>
                    Genero:
                    <?= $row['categoria'] ?>
                </span>
            </div>
            <div class="text-justify mt-2 mb-6 font-bold">
                <?= $row['descripcion'] ?>


    </div>
            <p class="text-justify">
                <?= nl2br($row['noticia']) ?>
            </p>
        </article>
        <?php

    } else {


        ?>
        <article>
            <h2 class='text-[#4A6FA5] font-bold'>No hay artículos sobre la categoría.</h2>

        </article>
        <?php

    }
}


function getArticleforuser($id) {
    global $conn;
    $sql = "SELECT * FROM articulos WHERE id_users = ? AND id_articulo = ? AND activo = 1 ;";
    $stmt = $conn->prepare($sql);
    $stmt ->bind_param("ii", $_SESSION['user']['id_users'] ,$id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null;
    }


}


function getArticlesBySearch($search){
    $search = "%$search%";
    global $conn;
    $sql = "SELECT a.*, u.name as name , u.surname as surname, c.nombre as categoria FROM articulos as a inner join users as u 
    on u.id_users = a.id_users inner join categorias as c on c.id_categoria = a.id_categoria WHERE a.activo = 1 
    AND (a.titulo LIKE ? OR a.noticia LIKE ? OR a.descripcion LIKE ? OR c.nombre LIKE ?) ORDER BY a.id_articulo desc;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $search, $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


?>
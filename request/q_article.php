<?php
require_once '../config/conection.php';

if (!isset($_SESSION['user'])) {
    $_SESSION['login'] = "Debes iniciar sesion primero!";
    header("Location: ../");
    exit();
} else {
    if (isset($_POST['title'])) {

        $errores = [];
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $category = isset($_POST['category']) ? $_POST['category'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;

        if (empty($title)) {
            $errores['title'] = "El titulo no puede estar vacio!";
        }
        if (empty($description)) {
            $errores['description'] = "La descripción no puede estar vacia!";
        }
        if (empty($category) && is_numeric($category)) {
            $errores['category'] = "La categoria no puede estar vacia!";
        }
        if (empty($content)) {
            $errores['content'] = "El contenido no puede estar vacio!";
        }

        if (count($errores) > 0) {
            $_SESSION['erroresarticle'] = $errores;
            header("Location: ../article.php");
            exit;
        } else {
            if ($title == null || $description == null || $category == null || $content == null) {
                header("Location: ../article.php");
            } else {



                $sql = "SELECT * FROM categorias WHERE id_categoria = ? AND activo = 1";
                $stmr = $conn->prepare($sql);
                $stmr->bind_param('i', $category);
                $stmr->execute();
                $result = $stmr->get_result();
                if (!($result->num_rows > 0)) {
                    $_SESSION['errorarticle'] = "La categoria no existe!";
                    header("Location: ../article.php");
                } else {

                    if (!empty($title) && !empty($description) && !empty($category) && !empty($content)) {
                        $stmr = $conn->prepare("INSERT INTO articulos (id_users,id_categoria,titulo, descripcion, noticia, activo, fecha) VALUES ( ?, ?, ?, ?, ?,1,NOW())");
                        $stmr->bind_param('iisss', $_SESSION['user']['id_users'], $category, $title, $description, $content);

                        if ($stmr->execute()) {
                            $_SESSION['successarticle'] = "Articulo creado correctamente!";
                            header("Location: ../article.php");
                        } else {
                            $_SESSION['errorarticle'] = "Error al crear el articulo!";
                            header("Location: ../article.php");
                        }
                    } else {
                        $_SESSION['errorarticle'] = "Debes rellenar todos los campos!";
                        header("Location: ../article.php");
                    }
                }
            }

        }

    } else if (isset($_GET['id_article'])) {

        $id = isset($_GET['id_article']) ? $_GET['id_article'] : null;

        if ($id == null) {
            $_SESSION['errorarticle'] = "Debe enviar datos!";
            header("Location: ../article.php");
        } else {
            $sql = "UPDATE articulos SET activo = 0 WHERE id_articulo = ?";
            $stmr = $conn->prepare($sql);
            $stmr->bind_param('i', $id);
            $stmr->execute();
            if ($stmr->affected_rows > 0) {
                $_SESSION['successarticle'] = "Articulo eliminado correctamente!";
                header("Location: ../article.php");
            } else {
                $_SESSION['errorarticle'] = "Error al eliminar el articulo!";
                header("Location: ../article.php");
            }
        }

    } else {
        $_SESSION['errorarticle'] = "Debe enviar datos!";
        header("Location: ../article.php");
    }
}




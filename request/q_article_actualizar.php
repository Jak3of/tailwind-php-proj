<?php
require_once '../config/conection.php';

if (!isset($_SESSION['user'])) {
    $_SESSION['login'] = "Debes iniciar sesion primero!";
    header("Location: ../");
    exit();
} else {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['content']) && isset($_GET['id'])) {

        $errores = [];
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $category = isset($_POST['category']) ? $_POST['category'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

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
            $_SESSION['erroresactualizar'] = $errores;
            header("Location: ../actualizarArticle.php?id=" . $id);
            exit;
        } else {
            if ($title == null || $description == null || $category == null || $content == null) {
                $_SESSION['erroractualizar'] = "Debes rellenar todos los campos!";
                header("Location: ../actualizarArticle.php?id=" . $id);
            } else {



                $sql = "SELECT * FROM categorias WHERE id_categoria = ? AND activo = 1";
                $stmr = $conn->prepare($sql);
                $stmr->bind_param('i', $category);
                $stmr->execute();
                $result = $stmr->get_result();
                if (!($result->num_rows > 0)) {
                    $_SESSION['erroractualizar'] = "La categoria no existe!";
                    header("Location: ../actualizarArticle.php?id=" . $id);
                } else {
                    $sql = "SELECT * FROM articulos WHERE id_articulo = ? AND activo = 1 AND id_users = ?";
                    $stmr = $conn->prepare($sql);
                    $stmr->bind_param('ii', $id, $_SESSION['user']['id_users']);
                    $stmr->execute();
                    $result = $stmr->get_result();
                    if (!($result->num_rows > 0)) {
                        $errorlogin['login'] = "No tienes permiso para actualizar este articulo!";
                        $_SESSION['erroreslogin'] = $errorlogin;
                        header("Location: ../");
                    } else {

                        if (!empty($title) && !empty($description) && !empty($category) && !empty($content)) {
                            
                            $stmr = $conn->prepare("UPDATE articulos SET  id_categoria = ?, titulo = ?, descripcion = ?, noticia = ?, fecha = NOW() WHERE id_articulo = ?");
                            $stmr->bind_param('isssi',$category, $title, $description, $content, $id);
                            $stmr->execute();
                            if ($stmr ->affected_rows > 0) {
                                
                                $_SESSION['successactualizar'] = "Articulo actualizado correctamente!";
                                header("Location: ../actualizarArticle.php?id=" . $id);
                            } else {
                                $_SESSION['erroractualizar'] = "Error al actualizar el articulo!";
                                header("Location: ../actualizarArticle.php?id=" . $id);
                            }
                        } else {
                            $_SESSION['erroractualizar'] = "Debes rellenar todos los campos!";
                            header("Location: ../actualizarArticle.php?id=" . $id);
                        }
                    }
                }
            }

        }

    } else {
        $errorlogin = array();
        $errorlogin['login'] = "Debes iniciar sesion primero!";
        $_SESSION['erroreslogin'] = $errorlogin;
        header("Location: ../");
    }
}




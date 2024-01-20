<?php
require_once '../config/conection.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    
} else {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        echo $name;
        if (!empty($name)) {
            $stmt = $conn->prepare("INSERT INTO categorias VALUES (null, ?, 1)");
            $stmt->bind_param("s", $name);
    
            if ($stmt->execute()) {
                $_SESSION['successcategory'] = "Categoria añadida correctamente!";
                header("Location: ../catergory.php");
            } else {
                $_SESSION['errorcategory'] = "Error al anadir la categoria!";
                header("Location: ../catergory.php");
            }
    
            $stmt->close();
        } else {
            $_SESSION['errorcategory'] = "Debes rellenar el campo!";
            header("Location: ../catergory.php");
        }
    }
    
    else if (isset($_GET['id_category'])) {
        $id = $_GET['id_category'];
        $id = is_string($id) ?  (int) $id : $id;
    
        if (!empty($id) && is_numeric($id)) {
            $stmt = $conn->prepare("UPDATE categorias SET activo = 0 WHERE id_categoria = ?");
            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                $_SESSION['successcategory'] = "Categoria eliminada correctamente!";
                header("Location: ../catergory.php");
            } else {
                $_SESSION['errorcategory'] = "Error al eliminar la categoria!";
                header("Location: ../catergory.php");
            }
    
            $stmt->close();
        } else {
            $_SESSION['errorcategory'] = "Error al eliminar la categoria!";
            header("Location: ../catergory.php");
        }
    }
    else{
        header("Location: ../catergory.php");
    }
    
}


<?php
require_once '../config/conection.php';

$errores = array();

if (isset($_POST['name'], $_POST['surname'], $_POST['email'])) {
    $name = $_POST['name'] ? $_POST['name'] : false;
    $surname = $_POST['surname'] ? $_POST['surname'] : false;
    $email = $_POST['email'] ? $_POST['email'] : false;
    
    // validations of inputs of users

    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $name = trim($name);
        
    } else {
        $errores['name'] = 'El nombre no es válido';
    }

    if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
        $surname = trim($surname);
        
    } else {
        $errores['surname'] = 'El apellido no es válido';
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = trim($email);
        
    } else {
        $errores['email'] = 'El email no es válido';
    }

    
    if (isset($_SESSION['user'])  && $_SERVER['HTTP_REFERER'] == 'http://localhost/blog-videojuegos/profile.php') {
        
        
        // update users
        
            // insert user
            if (count($errores) == 0) {
                
                $sql = 'SELECT  * FROM users WHERE email = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                if ( $user['id_users'] != $_SESSION['user']['id_users']) {
                    $errores['email'] = 'El email ya existe';
                } else {
                    $sql = "UPDATE users SET name = ?, surname = ?, email = ? WHERE id_users = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('sssi', $name, $surname, $email, $_SESSION['user']['id_users']);
                    $result = $stmt->execute();
                    if ($result) {
                        $_SESSION['user'] = array_merge(
                            $_SESSION['user'], 
                            array(
                                'name' => $name, 
                                'surname' => $surname, 
                                'email' => $email
                            )
                        );
                        reLocation('successactualizar', 'El usuario se ha actualizado correctamente');
                    } else {
                        reLocation('erroractualizar', 'El usuario no se ha podido actualizar');
                    }
                }
                
            } else {
                reLocation('erroresactualizar', $errores);
            }
        
    } else {
        reLocation('erroractualizar', 'No se puede realizar la petición');
        
    }



} else {
    reLocation('erroractualizar', 'No se puede realizar la petición');
}

function reLocation($module, $message) {
    $_SESSION[$module] = $message;
    header("Location: ../profile.php");
    exit;
}
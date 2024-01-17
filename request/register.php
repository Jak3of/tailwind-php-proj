<?php 

    session_start();
    $errores = array();

    if(isset($_POST)) {
        include_once '../config/conection.php';
        $name = $_POST['name'] ? $_POST['name'] : false;
        $surname = $_POST['surname'] ? $_POST['surname'] : false;
        $email = $_POST['email'] ? $_POST['email'] : false;
        $password = $_POST['password'] ? $_POST['password'] : false;
        $password_confirmation = $_POST['password_confirmation'] ? $_POST['password_confirmation'] : false;

        // validations of inputs of users

        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
            $name = trim($name);
            $name = htmlspecialchars($name);
            $name = strip_tags($name);
        } else {
            $errores['name'] = 'El nombre no es válido';
        }

        if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
            $surname = trim($surname);
            $surname = htmlspecialchars($surname);
            $surname = strip_tags($surname);
        } else {
            $errores['surname'] = 'El apellido no es válido';
        }

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = trim($email);
            $email = htmlspecialchars($email);
            $email = strip_tags($email);
        } else {
            $errores['email'] = 'El email no es válido';
        }

        if (!empty($password)) {
            $password = trim($password);
            $password = htmlspecialchars($password);
            $password = strip_tags($password);
        } else {
            $errores['password'] = 'La contraseña no es válida';
        }

        if (!empty($password_confirmation)) {
            $password_confirmation = trim($password_confirmation);
            $password_confirmation = htmlspecialchars($password_confirmation);
            $password_confirmation = strip_tags($password_confirmation);
        } else {
            $errores['password_confirmation'] = 'La contraseña no es válida';
        }

        // check if email already exists
   
        if (count($errores) == 0) {
            $password = hash('sha512', $password);
            $password_confirmation = hash('sha512', $password_confirmation);
            
            if ($user) {
                reLocation('email','El email ya existe');
                exit;
            } else {
                // insert user
                if ($password == $password_confirmation) {
                    
                } else {
                    
                    reLocation('password_confirmation','Las contraseñas no coinciden');
                }
            }
        } else {
            $_SESSION['errores'] = $errores;
            header("Location: ../index.php");
        }
        


    } else {
        reLocation('register','No se ha podido registrar el usuario');
    }

    function reLocation($location, $error) {
        // close db

        $errores["$location"] = $error;
        $_SESSION['errores'] = $errores;
        header("Location: http://localhost/blog-videojuegos/");
        exit;
    }
    
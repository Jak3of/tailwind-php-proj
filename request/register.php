<?php
require_once '../config/conection.php';

$errores = array();

if (isset($_POST)) {
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

    if (!empty($password) ) {
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


    if (count($errores) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        
        // check if email already exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $errores['email'] = 'El email ya existe';
            reLocation('errores', $errores);
            exit;
        } else {
            // insert user
            if (password_verify($password_confirmation, $password)) {
                
                $sql = "INSERT INTO users (name, surname, email, password,fecha) VALUES ('$name', '$surname', '$email', '$password', NOW())";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_assoc($result);
                    $_SESSION['user'] = $user;
                    reLocation('register', 'El usuario se ha registrado correctamente');
                } else {
                    reLocation('register', 'El usuario no se ha podido registrar');
                }
            } else {
                $errores['password_confirmation'] = "Las contraseñas no coinciden";
                reLocation('errores', $errores);
            }
        }
    } else {

        reLocation('errores', $errores);
    }



} else {
    reLocation('register', 'No se puede realizar la petición');
}

function reLocation($vars, $message)
{
    // close db

    $_SESSION[$vars] = $message;
    header("Location: ../");
    exit;
}

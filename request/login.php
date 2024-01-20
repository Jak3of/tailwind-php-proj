<?php
require_once '../config/conection.php';


$errores = array();
// logearse erroreslogin

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                $user = mysqli_fetch_array($query);
                $verify = password_verify($password, $user['password'] );
                
                if ($verify) {
                    $_SESSION['user'] = $user;
                    reLocation('login', 'El usuario se ha logeado correctamente');
                } else {
                    $errores['password'] = 'La contraseña es incorrecta';
                    reLocation('erroreslogin', $errores);
                }
            } else {
                $errores['email'] = 'El email no existe';
                reLocation('erroreslogin', $errores);
            }
        } else {
            $errores['sqllogin'] = 'Error en la consulta';
            reLocation('erroreslogin', $errores);
        }
    } else {
        $errores['login'] = 'Por favor rellena todos los campos';
        reLocation('erroreslogin', $errores);
    }
} else {
    $errores['login'] = 'Tiene que rellenar los campos y presionar el boton';
    reLocation('erroreslogin', $errores);
}


function reLocation($vars, $message)
{
    global $conn; 
    // db close 
    mysqli_close($conn);
    $_SESSION[$vars] = $message;
    header("Location: ../");
    exit;
}





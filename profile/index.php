<?php

require_once '../setup.php';
require_once '../database/conexion.php';

// Impide acceder sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
}
$user_id = $_SESSION['userdata']['id'];

// Comprueba que se ha enviado el input
if( isset($_POST['editar'])){
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $newpass = $_POST['newpass'] ?? null;
    $confirmpass = $_POST['confirmpass'] ?? null;

    $errors = [];

   

    // NOMBRE
    if ( !empty($username) ){
        if ( strlen($username) < 6 ) {
            $errors['username']['length'] = "El nombre de usuario debe tener al menos 6 caracteres.";
        }

        if ( !preg_match("/[0-9a-zA-Z]+/", $username) ){
            $errors['username']['format'] = "El nombre solo admite números y letras (Mayúsculas y minúsculas).";
        }

        if( empty($errors) ){

            

            $query = "UPDATE users SET username = '$username' WHERE id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);

            if( $result ){
                $_SESSION['userdata']['username'] = $username;
                $cambios_realizados = true;
            }else{
                die("Error en al guardar en la base de datos.");
            }
        }

    }

    // EMAIL
    if ( !empty($email) ){

        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            $errors['email']['format'] = "Debes introducir un email válido.";
            $email = null;
        }

        if( empty($errors) ){

            $user_id = $_SESSION['userdata']['id'];

            $query = "UPDATE users SET email = '$email' WHERE id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);

            if( $result ){
                $cambios_realizados = true;     
            }else{
                die("Error en al guardar en la base de datos."); 
            }
        }
    }

    // CONTRASEÑA
    if ( !empty($password) || !empty($newpass) || !empty($confirmpass) ){

        if( empty($password) ){
            $errors['password']['empty'] = "Debe introducir su contraseña actual.";
            $password = null;
        }

        if( !password_verify($password, $_SESSION['userdata']['password']) ){
            $errors['password']['match'] = "Su contraseña actual es errónea.";
        }

        if( empty($newpass) ){
            $errors['newpass']['empty'] = "Debe introducir su nueva contraseña.";
            $password = null;
        }

        if( empty($confirmpass) ){
            $errors['confirmpass']['empty'] = "Debe repetir su nueva contraseña.";
            $password = null;
        }

        if ( $newpass != $confirmpass ){
            $errors['confirmpass']['match'] = "Las nuevas contraseñas no coinciden.";
        }

        if( empty($errors) ){
            $password_segura = password_hash($newpass, PASSWORD_BCRYPT);

            $user_id = $_SESSION['userdata']['id'];

            $query = "UPDATE users SET password = '$password_segura' WHERE id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);

            if( $result ){
                $_SESSION['userdata']['password'] = $password_segura;
                $cambios_realizados = true; 
            }else{
                die("Error en al guardar en la base de datos.");
            }
        }
    }

}

require_once 'profile.view.php';

?>
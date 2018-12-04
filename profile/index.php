<?php

require_once '../setup.php';
require_once '../database/conexion.php';

if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
}
if( isset($_POST['editar'])){
    $username = $_POST['username'] ?? null;

    $errors = [];

    if ( empty($username) ){
        $errors['username']['empty'] = "Debes introducir un nombre.";
        $username = null;
    }

    if ( strlen($username) < 6 ) {
        $errors['username']['length'] = "El nombre de usuario debe tener al menos 6 caracteres.";
        $username = null;
    }

    if ( !preg_match("/[0-9a-zA-Z]+/",$username) ){
        $errors['username']['format'] = "El nombre solo admite números y letras (Mayúsculas y minúsculas).";
        $username = null;
    }

    if( empty($errors) ){

        $user_id = $_SESSION['userdata']['id'];

        $query = "UPDATE users SET username = '$username' WHERE id = $user_id";
        $result = mysqli_query($db, $query);

        if( $result ){ // Si todo va bien redirige al index
            header("Location: /proyectoServidor/");
        }else{
            die("Error en al guardar en la base de datos.");
        }

        die();
    }
}


require_once 'profile.view.php';

?>
<?php

require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../helpers/helpers.php';

// Impide que se acceda a la edición de conciertos sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}
$user_id = $_SESSION['userdata']['id'];

// Comprobar que se recibe un id por get
if ( !isset($_GET['id']) ){
    header("Location: ".APP_URL.'login');
    die();
}
$concert_id = $_GET['id'];

// Comprobar que el concierto pertenece al usuario logeado
if ( !checkConcertOwner($db, $concert_id, $user_id) ){
    header("Location: ".APP_URL);
    die();
}

// Comprueba que se ha enviado el input
if ( isset($_POST['editar']) ){
    // strip_tags evita que se introduzcan tags de html
    // trim elimina los espacios en blanco al comienzo y al final de la cadena
    $nombreconcierto = strip_tags(trim($_POST['nombreconcierto']) ) ?? null;
    $ubicacionconcierto = strip_tags(trim($_POST['ubicacionconcierto']) ) ?? null;
    $precioconcierto = trim($_POST['precioconcierto']) ?? null;

    $errors = [];

    // Nombre
    if ( !empty($nombreconcierto) ){
        if ( strlen($nombreconcierto) < 2 ) {
            $errors['nombreconcierto']['length'] = "El nombre debe tener al menos 2 caracteres.";
        }
        if( empty($errors) ){
            $query = "UPDATE concerts SET name = '$nombreconcierto' WHERE id = $concert_id AND user_id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);
        }
    }
    // Ubicación
    if ( !empty($ubicacionconcierto) ){
        if ( strlen($ubicacionconcierto) < 4 ) {
        $errors['ubicacionconcierto']['length'] = "La ubicación debe tener al menos 4 caracteres.";
        }
        if( empty($errors) ){
            $query = "UPDATE concerts SET location = '$ubicacionconcierto' WHERE id = $concert_id AND user_id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);
        }
    }
    // Precio
    if ( !empty($precioconcierto) || $precioconcierto === '0' ){
        if( !is_numeric($precioconcierto) ){
            $errors['precioconcierto']['not_number'] = "El precio debe ser un número.";
        }
        if( $precioconcierto < 0 ){
            $errors['precioconcierto']['less_than_zero'] = "El precio no puede ser inferior a cero.";
        }
        if( empty($errors) ){
            $query = "UPDATE concerts SET price = '$precioconcierto' WHERE id = $concert_id AND user_id = $user_id LIMIT 1";
            $result = mysqli_query($db, $query);
        }
    }
    if( empty($errors) ){
        header("Location: ".APP_URL.'mis_conciertos');
    }
}

require_once 'editar_concierto.view.php';

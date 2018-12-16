<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../helpers/helpers.php';

// Impide acceder a la edición de nota sin estar logeado
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
$artist_id = $_GET['id'];


// Comprobar que el concierto pertenece al usuario logeado
if( !checkArtistOwner($db, $artist_id, $user_id) ){
    header("Location: ".APP_URL);
    die();
}
if( isset($_POST['editar_artista']) ){
    // strip_tags evita que se introduzcan tags de html
    // trim elimina los espacios en blanco al comienzo y al final de la cadena
    $nombre_artista = strip_tags(trim($_POST['nombreartista']) ) ?? null;

    if ( empty($nombre_artista) ){
        $errors['nombreartista']['empty'] = "Debes introducir un nombre.";
        $nombre_artista = null;
    }

    if ( strlen($nombre_artista) < 2 ) {
        $errors['nombreartista']['length'] = "El nombre debe tener al menos 2 caracteres.";
    }

    if( empty($errors) ){
        $query = "UPDATE artists SET name = '$nombre_artista' WHERE id = $artist_id AND user_id = $user_id LIMIT 1";
        $result = mysqli_query($db, $query);
        header("Location: ".APP_URL.'mis_artistas');
    }
}

require_once 'editar_artista.view.php';
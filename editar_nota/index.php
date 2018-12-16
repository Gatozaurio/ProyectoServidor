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
$note_id = $_GET['id'];


// Comprobar que el concierto pertenece al usuario logeado
if( !checkNoteOwner($db, $note_id, $user_id) ){
    header("Location: ".APP_URL);
    die();
}

if( isset($_POST['editar']) ){
    $nombreconcierto = strip_tags(trim($_POST['nombreconcierto']) ) ?? null;
    $nota = strip_tags(trim($_POST['note']) ) ?? null;

    if ( empty($nota) ){
        $errors['note']['empty'] = "Debes introducir algo en la nota.";
        $nota = null;
    }

    if( empty($errors) ){
        $query = "UPDATE notes SET text = '$nota' WHERE id = $note_id AND user_id = $user_id LIMIT 1";
        $result = mysqli_query($db, $query);
        header("Location: ".APP_URL.'mis_conciertos');
    }

}

require_once 'editar_nota.view.php';
<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../helpers/helpers.php';

// Impide acceder a un concierto sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}
$user_id = $_SESSION['userdata']['id'];

// Comprobar que se recibe un id por get
if( !isset($_GET['id']) ){
    header("Location: ".APP_URL);
    die();
}
$id_concierto = $_GET['id'];


// Comprobar que el concierto pertenece al usuario logeado
if( !checkConcertOwner($db, $id_concierto, $user_id) ){
    header("Location: ".APP_URL);
    die();
}
if( isset($_POST['addnote']) ){
    // strip_tags evita que se introduzcan tags de html
    // trim elimina los espacios en blanco al comienzo y al final de la cadena
    $nota = strip_tags(trim($_POST['note']) ) ?? null;

    if ( empty($nota) ){
        $errors['note']['empty'] = "Debes introducir algo en la nota.";
        $nota = null;
    }

    if( empty($errors) ){
        $user_id = $_SESSION['userdata']['id'];
        $query = "INSERT into notes VALUES(NULL, '$user_id', '$id_concierto', '$nota', NOW(), NOW())";

        $guardar = mysqli_query($db, $query);

        if( $guardar ){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }  
    }
}

// Sacar concierto de la base de datos
$concert_query = "SELECT * FROM concerts WHERE id = $id_concierto;";
$concierto = mysqli_query($db, $concert_query);
$datos_concierto = mysqli_fetch_assoc($concierto);

// Sacar notas del concierto
$notes_query = "SELECT * FROM notes WHERE concert_id = $id_concierto;";
$result_notes = mysqli_query($db, $notes_query);



require_once 'concierto.view.php';
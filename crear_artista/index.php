<?php
    require_once '../setup.php';
    require_once '../database/conexion.php';

    // Impide que se acceda a la creación de conciertos sin estar logeado
    if ( empty($_SESSION) ){
        header("Location: ".APP_URL.'login');
        die();
    }
    $user_id = $_SESSION['userdata']['id'];

    // Comprueba que se ha enviado el input
    if( isset($_POST['nuevo_artista']) ){
        // strip_tags evita que se introduzcan tags de html
        // trim elimina los espacios en blanco al comienzo y al final de la cadena
        $nombreartista = strip_tags(trim($_POST['nombreartista']));

        // Array de errores
        $errors = [];

        // Validaciones
        if ( empty($nombreartista) ){
            $errors['nombreartista']['empty'] = "Debes introducir el nombre del artista.";
        }
        if ( strlen($nombreartista) < 2 ) {
            $errors['nombreartista']['length'] = "El nombre debe tener al menos 2 caracteres.";
        }
    
        if( empty($errors) ){
            $query = "INSERT into artists VALUES(NULL, '$user_id', '$nombreartista', NOW(), NOW())";
            $guardar = mysqli_query($db, $query);
            header("Location: ".APP_URL.'mis_artistas');
        }
    }
    require_once 'crear_artista.view.php';
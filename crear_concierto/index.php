<?php
    require_once '../setup.php';
    require_once '../database/conexion.php';

    /* if ( empty($_SESSION) ){
        header("Location: ".APP_URL.'login');
        die();
    } */

    if( isset($_POST['nuevo_concierto']) ){
        $nombreconcierto = trim($_POST['nombreconcierto']) ?? null;
        $ubicacionconcierto = trim($_POST['ubicacionconcierto']) ?? null;
        $precioconcierto = trim($_POST['precioconcierto']) ?? null;
        $precioconcierto = trim($_POST['precioconcierto']) ?? null;

        // Array de errores
        $errors = [];

        // Validaciones
        // nombre:
        if ( empty($nombreconcierto) ){
            $errors['nombreconcierto']['empty'] = "Debes introducir un nombre para el ocncierto.";
            $username = null;
        }

        if ( strlen($nombreconcierto) < 4 ) {
            $errors['listname']['length'] = "El nombre del concierto debe tener al menos 4 caracteres.";
            $username = null;
        }
    
        if( empty($errors) ){
            // Insertar usuario en la base de datos
            $user_id = $_SESSION['usuario']['id'];
            $sql = "INSERT INTO lists(id, user_id, name, description) VALUES(NULL, $user_id, '$listname', '$description')";

            $guardar = mysqli_query($db, $sql);

            if( $guardar ){
                $id = mysqli_insert_id($db);
                // Redirigir a la página de Mis listas
                header("Location: ".BASE_URL.'list/?id='.$id);
                die();
            }

            echo "Error";
            die();   
        }
    }
    require_once 'crear_concierto.view.php';
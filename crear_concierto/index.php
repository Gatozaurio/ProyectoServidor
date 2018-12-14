<?php
    require_once '../setup.php';
    require_once '../database/conexion.php';

    // Impide que se acceda a la creación de conciertos sin estar logeado
    if ( empty($_SESSION) ){
        header("Location: ".APP_URL.'login');
        die();
    } 

    if( isset($_POST['nuevo_concierto']) ){
        $nombreconcierto = trim($_POST['nombreconcierto']) ?? null;
        $ubicacionconcierto = trim($_POST['ubicacionconcierto']) ?? null;
        $precioconcierto = trim($_POST['precioconcierto']) ?? null;

        // Array de errores
        $errors = [];

        // Validaciones
        // nombre:
        if ( empty($nombreconcierto) ){
            $errors['nombreconcierto']['empty'] = "Debes introducir un nombre para el concierto.";
            $nombreconcierto = null;
        }

        // ubicación:
        if ( empty($ubicacionconcierto) ){
            $errors['ubicacionconcierto']['empty'] = "Debes introducir la ubicación del concierto.";
            $ubicacionconcierto = null;
        }

        if ( strlen($ubicacionconcierto) < 4 ) {
            $errors['ubicacionconcierto']['length'] = "La ubicación debe tener al menos 4 caracteres.";
            $ubicacionconcierto = null;
        }

        // precio:
        if ( empty($precioconcierto) ){
            $errors['precioconcierto']['empty'] = "Debes introducir el precio del concierto.";
            $precioconcierto = null;
        }

        if( !is_numeric($precioconcierto) ){
            $errors['precioconcierto']['not_number'] = "El precio debe ser un número.";
            $precioconcierto = null;
        }

        if( $precioconcierto < 0 ){
            $errors['precioconcierto']['less_than_zero'] = "El precio no puede ser inferior a cero.";
            $precioconcierto = null;
        }
    
        if( empty($errors) ){
            $user_id = $_SESSION['userdata']['id'];
            $query = "INSERT into concerts VALUES(NULL, '$user_id', '$nombreconcierto', '$ubicacionconcierto', '$precioconcierto', NOW(), NOW())";

            $guardar = mysqli_query($db, $query);

            if( $guardar ){
               /*  $id = mysqli_insert_id($db);
                // Redirigir a la página de Mis listas
                header("Location: ".BASE_URL.'list/?id='.$id);
                die(); */
                header('Location:'.APP_URL.'mis_conciertos');
                die();
            } 

            //echo "Error";
            // die();
        }
    }
    require_once 'crear_concierto.view.php';
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
    if( isset($_POST['nuevo_concierto']) ){
        // strip_tags evita que se introduzcan tags de html
        // trim elimina los espacios en blanco al comienzo y al final de la cadena
        $nombreconcierto = strip_tags(trim($_POST['nombreconcierto']) ) ?? null;
        $ubicacionconcierto = strip_tags(trim($_POST['ubicacionconcierto'])) ?? null;
        $precioconcierto = $_POST['precioconcierto'] ?? null;

        // Array de errores
        $errors = [];

        // Validaciones
        // nombre:
        if ( empty($nombreconcierto) ){
            $errors['nombreconcierto']['empty'] = "Debes introducir el nombre del artista.";
            $nombreconcierto = null;
        }
        if ( strlen($nombreconcierto) < 2 ) {
            $errors['nombreconcierto']['length'] = "El nombre debe tener al menos 2 caracteres.";
        }

        // ubicación:
        if ( empty($ubicacionconcierto) ){
            $errors['ubicacionconcierto']['empty'] = "Debes introducir la ubicación del concierto.";
            $ubicacionconcierto = null;
        }

        if ( strlen($ubicacionconcierto) < 4 ) {
            $errors['ubicacionconcierto']['length'] = "La ubicación debe tener al menos 4 caracteres.";
        }

        // precio:
        if ( empty($precioconcierto) && $precioconcierto !== '0' ){ // Es necesario añadir una condición adicional para que empty no filtre el 0
            $errors['precioconcierto']['empty'] = "Debes introducir el precio del concierto.";
            $precioconcierto = null;
        }

        if( !is_numeric($precioconcierto) ){
            $errors['precioconcierto']['not_number'] = "El precio debe ser un número.";
        }

        if( $precioconcierto < 0 ){
            $errors['precioconcierto']['less_than_zero'] = "El precio no puede ser inferior a cero.";
        }
    
        if( empty($errors) ){
            $query = "INSERT into concerts VALUES(NULL, '$user_id', '$nombreconcierto', '$ubicacionconcierto', $precioconcierto, NOW(), NOW())";
            $guardar = mysqli_query($db, $query);
            header("Location: ".APP_URL.'mis_conciertos');
        }
    }
    require_once 'crear_concierto.view.php';
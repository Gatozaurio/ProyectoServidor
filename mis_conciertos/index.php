<?php

require_once '../setup.php';
require_once '../database/conexion.php';

// Impide que se acceda a mis conciertos sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
} 

$user_id = $_SESSION['userdata']['id'];

$query = "SELECT * FROM concerts WHERE user_id = $user_id";
$conciertos_obtenidos = mysqli_query($db, $query);

require_once 'mis_conciertos.view.php';
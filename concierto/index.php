<?php
require_once '../setup.php';
require_once '../database/conexion.php';

// Impide acceder a un concierto sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}

if( !isset($_GET['id']) ){
    header("Location: ".APP_URL);
}
$id_concierto = $_GET['id'];

// Sacar concierto de la base de datos
$query = "SELECT 1 FROM concerts WHERE id = $id_concierto;";
$concierto = mysqli_query($db, $query);
$datos_concierto = mysqli_fetch_assoc($concierto);

require_once 'concierto.view.php';
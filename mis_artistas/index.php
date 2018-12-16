<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../helpers/helpers.php';

// Impide acceder sin estar logeado
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}
$user_id = $_SESSION['userdata']['id'];


// Sacar concierto de la base de datos
/* $concert_query = "SELECT * FROM concerts WHERE id = $id_concierto;";
$concierto = mysqli_query($db, $concert_query);
$datos_concierto = mysqli_fetch_assoc($concierto);  */

// Sacar artistas de la bd
$artists_query = "SELECT * FROM artists WHERE user_id = $user_id;";
$result_artists = mysqli_query($db, $artists_query);




require_once 'mis_artistas.view.php';
<?php

require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../helpers/helpers.php';

// Impide que se acceda a mis conciertos sin estar logueado
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
$artist_id = $_GET['id'];

// Comprobar que el concierto pertenece al usuario logeado
if( !checkArtistOwner($db, $artist_id, $user_id) ){
    header("Location: ".APP_URL);
    die();
}

$artists_query = "SELECT name FROM artists WHERE id =$artist_id and user_id = $user_id LIMIT 1; ";
$result_artist = mysqli_query($db, $artists_query);
$artist_array = mysqli_fetch_assoc($result_artist);
$artist_name = $artist_array['name'];


$concerts_query = "SELECT * FROM concerts WHERE user_id = $user_id and name = '$artist_name'; ";
$result_concerts = mysqli_query($db, $concerts_query); 

require_once 'conciertos_artista.view.php';
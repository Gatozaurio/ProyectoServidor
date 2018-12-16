<?php
/**
 * Muestra los errores de validación.
 * 
 * @param $array Array de errores.
 * @param $tipoError Error de la validación que no se ha superado.
 */
function mostrarErroresFormulario($array, $tipoError){
        $html = "<div class='invalid-feedback'>";
        foreach ($array["${tipoError}"] as $error){
            $html .= "${error}<br>";
        }
        $html .= '</div>';
    return $html;
}
/**
 * Muestra los mensajes de alerta del login.
 * 
 * @param $array Array de errores.
 * @param $tipoError Error de la validación que no se ha superado.
 */
function mostrarErroresLogin($array, $tipoError){
    $html = "<div class='alert alert-danger'>";
    foreach ($array["${tipoError}"] as $error){
        $html .= "${error}<br>";
    }
    $html .= '</div>';
    return $html;
}
/**
 * Comprueba que que el concierto pertenece al usuario.
 * 
 * @param $db Base de datos contra la que se realiza la consulta.
 * @param $concert_id ID del concierto.
 * @param $user_id ID del usuario.
 */
function checkConcertOwner($db, $concert_id, $user_id) {
    $sql = "SELECT * FROM concerts WHERE id = $concert_id  AND user_id = $user_id LIMIT 1";
    $query = mysqli_query($db, $sql);
    return mysqli_num_rows($query) == 0 ? false : true;
}
/**
 * Comprueba que que la nota pertenece al usuario.
 * 
 * @param $db Base de datos contra la que se realiza la consulta.
 * @param $concert_id ID de la nota.
 * @param $user_id ID del usuario.
 */
function checkNoteOwner($db, $note_id, $user_id) {
    $sql = "SELECT * FROM notes WHERE id = $note_id  AND user_id = $user_id LIMIT 1";
    $query = mysqli_query($db, $sql);
    return mysqli_num_rows($query) == 0 ? false : true;
}
/**
 * Comprueba que que el artista pertenece al usuario.
 * 
 * @param $db Base de datos contra la que se realiza la consulta.
 * @param $concert_id ID del artista.
 * @param $user_id ID del usuario.
 */
function checkArtistOwner($db, $artist_id, $user_id) {
    $sql = "SELECT * FROM artists WHERE id = $artist_id  AND user_id = $user_id LIMIT 1";
    $query = mysqli_query($db, $sql);
    return mysqli_num_rows($query) == 0 ? false : true;
}





?>
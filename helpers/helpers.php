<?php

function mostrarErroresFormulario($array, $tipoError){
        $html = "<div class='invalid-feedback'>";
        foreach ($array["${tipoError}"] as $error){
            $html .= "${error}<br>";
        }
        $html .= '</div>';
    return $html;
}

function mostrarErroresLogin($array, $tipoError){
    $html = "<div class='alert alert-danger'>";
    foreach ($array["${tipoError}"] as $error){
        $html .= "${error}<br>";
    }
    $html .= '</div>';
return $html;
}





?>
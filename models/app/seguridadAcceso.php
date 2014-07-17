<?php

$root = BASE_URL;

if( ! session_id() ){
    session_start();
}



if ($_SESSION["autentificado"] != "SI") {

    header("Location: $root");
    exit();

}
else{

    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));


    if($tiempo_transcurrido >= 600000) {

        session_destroy();

        header("Location: $root");

    }else {
        $_SESSION["ultimoAcceso"] = $ahora;
    }
}
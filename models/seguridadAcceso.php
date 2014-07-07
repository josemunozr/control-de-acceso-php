<?php

session_name("loginUsuario");
session_start();


//antes de hacer los cálculos, compruebo que el usuario está logueado

if ($_SESSION["autentificado"] != "SI") {
    //si no está logueado lo envío a la página de autentificación
    header("Location: index.php");


} else {

    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 5) {
        //si pasaron 5 minutos o más
        session_destroy(); // destruyo la sesión

        header("Location: index.php"); //envío al usuario a la pag. de autenticación
        //sino, actualizo la fecha de la sesión
    }else {
        $_SESSION["ultimoAcceso"] = $ahora;
    }
}
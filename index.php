<?php
/*
 * El frontend controllers se encarga de
 * configurar nuestra aplicacion
 */

require "config.php";
require "helpers.php";

//Llamar al controlador indicado

controller($_GET['url']);


//var_dump($_GET);
<?php
/*
 * El frontend controllers se encarga de
 * configurar nuestra aplicacion
 */

require "config.php";
require "helpers.php";

// Library

require 'library/Request.php';


if (empty($_GET['url']))
{
    $url = "";
}
else
{
    $url = $_GET['url'];
}

$request = new Request($url);

var_dump($request->getUrl());
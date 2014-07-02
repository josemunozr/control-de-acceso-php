<?php
/*
 * El frontend controllers se encarga de
 * configurar nuestra aplicacion
 */

    require "config.php";
    //require "helpers.php";

    // Library

    require 'library/Request.php';
    require 'library/Inflector.php';
    require 'library/Response.php';
    require 'library/View.php';

    require 'library/Database.php';
    require 'library/Model.php';


    if (empty($_GET['url']))
    {
        $url = "";
    }
    else
    {
        $url = $_GET['url'];
    }

    $request = new Request($url);
    $request->execute();
   //var_dump($request->getControllerClassName());
    //$con = new Database();
    //var_dump($con);

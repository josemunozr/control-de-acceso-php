<?php

// FRONTEND CONTROLLER

    require "config.php";


    // Library
    require 'app/Request.php';
    require 'app/Inflector.php';
    require 'app/Response.php';
    require 'app/View.php';
    require 'app/Model.php';
    require 'app/Database.php';
    require 'app/BaseController.php';

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

    //$con = new Database();
    //var_dump($con);

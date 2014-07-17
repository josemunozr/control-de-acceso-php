<?php

abstract class BaseController {

    abstract function indexAction();

    protected  function loadModels($model)
    {
        $modelo = $model . 'Model';
        $rutaModel = "models/$modelo.php";

        if(is_readable($rutaModel))
        {
            require $rutaModel;
            $modelo = new $modelo;

            return $modelo;
        }
        else
        {
            throw new Exception('Error de modelo');
        }
    }

    protected function getLibrary($libreria)
    {
        $rutaLibreria = "library/$libreria.php";

        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }

    protected function typePerfil($codigo){

        if($codigo == '1')
        {
            return "operadorDoc";
        }
        elseif($codigo == '2')
        {
            return "administrador";
        }
        elseif($codigo == '3')
        {
            return "tecnico";
        }
        elseif($codigo == '4')
        {
            return "guardia";
        }
    }

}
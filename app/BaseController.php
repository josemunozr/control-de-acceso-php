<?php

class BaseController {

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

}
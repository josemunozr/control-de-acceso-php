<?php

class HomeController {

    protected $nameController = "home";
    protected $_post ;

    public function __construct()
    {
        $this->_post = $this->loadModel('login');
    }

    public function indexAction()
    {
          return new View('index', $this->nameController);
    }

    public function errorAction()
    {
        $post = $this->_post->getDatos();
        return new View('error', $this->nameController);
    }


    public  function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = "models/$modelo.php";

        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }

}

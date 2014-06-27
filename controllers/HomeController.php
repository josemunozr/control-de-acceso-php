<?php

class HomeController {

    //protected  $tipoPerfil = "Perfil Operador Doc";
     //protected  $titulo     = "Operador Doc";
    protected $nameController = "home";

    public function indexAction()
    {
        //return new View('home', ['tipoPerfil' => $this->tipoPerfil , 'titulo' =>$this->titulo]);
          return new View('index', $this->nameController);
    }


}

<?php

class HomeController {

    //protected  $tipoPerfil = "Perfil Operador Doc";
     //protected  $titulo     = "Operador Doc";
    public function indexAction()
    {
        //return new View('home', ['tipoPerfil' => $this->tipoPerfil , 'titulo' =>$this->titulo]);
          return new View('home');
    }

    /*public function moduloAction($modulo)
    {
        exit("modulo " . $modulo);
    }
*/
}

   /* $tipoPerfil = "Perfil Operador Doc";
    $titulo     = "Operador Doc";

    view('home', compact('tipoPerfil', 'titulo'));
   */
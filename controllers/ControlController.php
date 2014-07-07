<?php

class  ControlController extends BaseController {

    protected $user;
    protected $pass;

    protected $model;
    public function __construct()
    {
        $this->model = $this->loadModels('controll');
        $this->user = $_POST['usuario'];
        $this->pass = $_POST['pass'];
    }

    public function indexAction()
    {
        $session = $this->model->getUser($this->user, $this->pass);
        $perfil  = $this->model->getPerfil($this->user, $this->pass);

        if($this->user == $session['id_user'])
        {

            session_name("loginUsuario");
            session_start();
            $_SESSION["autentificado"]= "SI";
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");

            //header ("Location: ../operadorDoc");
            header ("Location: ../$perfil[tipo_perfil]");
        }
        else
        {

            header("Location: ../index.php?errorUsuario=true");
        }
    }



}
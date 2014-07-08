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


         //var_dump($this->user);
         //var_dump($session[0]['id_user']);
        //var_dump($perfil[0]['tipo_perfil']);

        //exit;
        if($this->user == $session[0]['id_user'])
        {

            session_name("loginUsuario");
            session_start();
            $_SESSION["autentificado"]= "SI";
            $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");

           // header ("Location: operadorDoc");
            $type = $perfil[0]['tipo_perfil'];
            header ("Location: $type");
        }
        else
        {

            header("Location: index.php?errorUsuario=true");
        }
    }

    public function logoutAction()
    {
        $root = BASE_URL;

        session_start();
        session_destroy();

        header("Location: $root ");
    }

    public function seguridadAction()
    {

    }


}
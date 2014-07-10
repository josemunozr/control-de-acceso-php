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
        $user = $this->user;
        $pass = $this->pass;


        $getUser = $this->model->getUser($user);
        $validatePass = $this->model->validatePass($user, $pass);
        $validateUser = $this->model->validateUser($user, $pass);
        $getPerfil  = $this->model->getPerfil($user);


        if($validateUser != 0) // Se valida si existe el usuario
        {

            if($validatePass != 0) // Se valida si la clave de usuario existe o es correcta
            {
                $perfil =  $getPerfil['tipo_perfil'];

                session_name($perfil);
                session_start();
                $_SESSION["autentificado"] = "SI";
                $_SESSION["usuarioActual"] =  $getUser['id_user'];
                $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");




                header ("Location: $perfil");
            }
            else
            {
                echo "<script>alert('Contrase\u00f1a Incorrecta')</script>";
            }
        }
        else
        {
            echo "<script>alert('Usuario Ingresado No existe')</script>";
        }

    }


    public function logoutAction()
    {

        session_start();
        session_destroy();

        header("Location: ../../ ");
    }



}
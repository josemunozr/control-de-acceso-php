<?php

class RememberPasswordController extends BaseController {

    protected   $user;
    protected   $correo;
    protected  $pass;

    protected $model;
    protected $modelGetData;

    public function __construct()
    {
        $this->model = $this->loadModels('rememberPass');
        $this->modelGetData = $this->loadModels('getDatos');

        $this->user = $_POST['usuario'];
        $this->correo = $_POST['correo'];

    }

    public function indexAction()
    {
        $user = $this->user;
        $correo = $this->correo;



        $validateUser = $this->model->validateUser($user);
        $getCorreo = $this->model->getCorreo($user);
        $validateCorreo = $this->model->validateCorreo($correo);

        $this->pass = $this->modelGetData->getPassUser($user);

        $passUser = $this->pass;



        if($validateUser != 0) // Se valida si existe el usuario
        {
            if($validateCorreo != 0) // Se valida si correo existe
            {


                $destino = $getCorreo['correo'];
                $asunto = $this->getAsunto();
                $mensaje = $this->getMensaje($passUser["pwd"]);
                $desde = "FROM: " . "dcaccesscontroll";

                $correo = mail($destino,$asunto,$mensaje,$desde) ;

                if($correo == true)
                {
                    /*echo "Se ha enviado sus credenciales al correo indicado: " . $destino;*/
                    header("Location: index.php?msgRememberPass=true");
                }
                else
                {
                    echo "<script>alert('Hubo un problema para poder recordar credenciales, favor intentar mas tarde')</script>
                  <script>window.location='index.php'</script>";
                }

            }
            else
            {
                echo "<script>alert('Correo Ingresado No existe')</script>
                  <script>window.location='index.php'</script>";
            }

        }
        else
        {
            header("Location: index.php?errorUser=true");
        }



    }


    public function getAsunto()
    {
        $asunto = "Validación y recuperación de contraseña";
        return $asunto;
    }

    public function getMensaje($pass)
    {
        $mensaje = "Su contraseña de acceso es $pass ";
        return $mensaje;
    }


    public function getUser()
    {
        return $this->user;
    }


    public function getCorreo()
    {
        return $this->correo;
    }



}
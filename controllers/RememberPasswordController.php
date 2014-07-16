<?php

class RememberPasswordController extends BaseController {

    protected   $user;
    protected   $correo;

    protected $model;

    public function __construct()
    {
        $this->model = $this->loadModels('rememberPass');
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




        if($validateUser != 0) // Se valida si existe el usuario
        {
            if($validateCorreo != 0) // Se valida si correo existe
            {


                $destino = $getCorreo['correo'];
                $asunto = $this->getAsunto();
                $mensaje = $this->getMensaje();
                $desde = "FROM: " . "dcaccesscontroll";

                $correo = mail($destino,$asunto,$mensaje,$desde) ;

                if($correo == true)
                {
                    echo "Se ha enviado sus credenciales al correo indicado: " . $destino;
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
            echo "<script>alert('Usuario Ingresado No existe')</script>
                  <script>window.location='index.php'</script>";
        }



    }


    public function getAsunto()
    {
        $asunto = "Validación recordar correo";
        return $asunto;
    }

    public function getMensaje()
    {
        $mensaje = "Este es un correo enviando donde se enviara su contraseña de acceso";
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
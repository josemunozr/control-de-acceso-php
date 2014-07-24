<?php

class TecnicoController extends BaseController {

    protected $nameController = "tecnico";
    protected $user;

    //vars index
    protected  $name;
    protected  $empresa;
    protected  $correo;

    protected $model;
    protected $modelSetData;

    public function __construct()
    {
        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->modelSetData = $this->loadModels('setDatos');

        if(isset($_SESSION["usuarioActual"]) && isset($_SESSION["perfil"])){
            $this->user = $_SESSION["usuarioActual"];
            $this->perfil = $_SESSION["perfil"];
        }
    }

    public function indexAction(){

        return new View('home' , $this->nameController,[

            'nombre'  => $this->getName(),
            'empresa' => $this->getEmpresa(),
            'correo'  => $this->getCorreo()

        ]);

    }

    public function accessRequestAction(){

        return new View('accessRequest' , $this->nameController);

    }

    public function newVisitsAction()
    {
        $base_perfil = $this->perfil;
        $cantInput = (integer)$_POST['cantInput'];

        $inputVisitantes = array();
        for($i=1;$i<=$cantInput; $i++)
        {
            $inputVisitantes[$i]=array(
                "nombre$i" => $_POST["nombreUsuario$i"],
                "apellido$i" => $_POST["apellidoUsuario$i"],
                "rut$i" => $_POST["rutUsuario$i"]
            );
        }


        $rutEmp = utf8_decode($_POST["rutEmpresa"]);
        $rutSolicitante = $this->user;
        $motivo = utf8_decode($_POST["motivoVisita"]);
        $fecha = utf8_decode($_POST["fechaVisita"]);
        $hora = utf8_decode($_POST["horaVisita"]);



        $setDatos = $this->modelSetData->accessRequest($cantInput,$inputVisitantes,$rutEmp,$rutSolicitante,$motivo,$fecha,$hora );

        if($setDatos == true)
        {
            echo "<script>alert('Datos guardados correctamente')</script>
                      <script>window.location='../$base_perfil'</script>";
        }
        else
        {
            echo "<script>alert('Datos ingresados ya se encuentran en Sistema')</script>
                      <script>window.location='accessRequest'</script>";
        }


    }


    /*
     * GETTERS
     */

    public function getCorreo()
    {
        $dato = $this->model->getCorreoUser($this->user);
        return $dato['correo'];
    }

    public function getEmpresa()
    {
        $dato = $this->model->getNombreEmpresaUser($this->user);
        return $dato['nombre'];
    }

    public function getName()
    {
        $dato = $this->model->getNombreApellidoUser($this->user);
        return $dato['nombre'] . " " .  $dato['apellido'];
    }

    public function getNameController()
    {
        return $this->nameController;
    }


}
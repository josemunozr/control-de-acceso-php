<?php

class GuardiaController extends BaseController {

    protected $nameController = "guardia";
    protected $user;
    protected $perfil;

    //vars index
    protected $name;
    protected $empresa;
    protected $correo;

    protected $model;
    protected $modelGetData;
    protected $modelUpdatedata;

    public function __construct()
    {
        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->modelGetData = $this->loadModels('getDatos');
        $this->modelUpdatedata = $this->loadModels('updateDatos');



        if(isset($_SESSION["usuarioActual"]) && isset($_SESSION["perfil"])){
            $this->user = $_SESSION["usuarioActual"];
            $this->perfil = $_SESSION["perfil"];
        }
    }


    public function indexAction()
    {
        $ListaEmpresa = $this->modelGetData->getListEmpresa();


        return new View('home', $this->getNameController(), [

            'nombre' => $this->getName(),
            'correo' => $this->getCorreo(),
            'empresa' => $this->getEmpresa(),
            'listEmpresa' => $ListaEmpresa

        ]);

    }

    public function viewVisitsAction()
    {
        $base_perfil = $this->perfil;

        //$ListaEmpresa = $this->modelGetData->getListEmpresa();

        $emp = $_POST["listaEmpresas"];
        $fecha = $_POST['fechaVisits'];

        $listVisit = $this->modelGetData->getVisitsEmpresa($emp,$fecha);


        if(count($listVisit) == 0)
        {
            header("Location: ../$base_perfil?estado=false");
        }
        else
        {
            return new View('viewVisits', $this->getNameController(),[
                'listVisits' => $listVisit
            ]);
        }



    }

    public function EstadoVisitaAction()
    {
        $base_perfil = $this->perfil;

        if ( ! empty($_POST['rutUsuario']) ) {
            $user = $_POST['rutUsuario'];


            $this->modelUpdatedata->modifyStatus($user);
            echo "<script>window.location='../$base_perfil'</script>";

        }
        else{

            echo "<script>window.location='../$base_perfil'</script>";

        }

    }

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

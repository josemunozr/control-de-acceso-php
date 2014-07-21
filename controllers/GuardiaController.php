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

    public function __construct()
    {
        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->modelGetData = $this->loadModels('getDatos');



        $this->user = $_SESSION["usuarioActual"];
        $this->perfil = $_SESSION["perfil"];
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

        $ListaEmpresa = $this->modelGetData->getListEmpresa();

        $emp = $_POST["listaEmpresas"];
        $fecha = $_POST["fechaVisits"];

        $listVisit = $this->modelGetData->getVisitsEmpresa($emp,$fecha);

        if(count($listVisit) == 0)
        {
            echo "<script>alert('No existe visitas para la Empresa o dia Consultada')</script>
                  <script>window.location='../$base_perfil'</script>";
        }
        else
        {
            return new View('viewVisits', $this->getNameController(),[
                'listVisits' => $listVisit,
                'listEmpresa' => $ListaEmpresa
            ]);
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

    /**
     * @return mixed
     */
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

<?php

class GuardiaController extends BaseController {

    protected $nameController = "guardia";
    protected $user;

    //vars index
    protected $name;
    protected $empresa;
    protected $correo;

    protected $model;

    public function __construct()
    {
        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->user = $_SESSION["usuarioActual"];
    }


    public function indexAction()
    {

        return new View('home', $this->getNameController(), [

            'nombre' => $this->getName(),
            'correo' => $this->getCorreo(),
            'empresa' => $this->getEmpresa()

        ]);

    }

    public function viewVisitsAction()
    {
        return new View('viewVisits', $this->getNameController());
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

<?php

class TecnicoController extends BaseController {

    protected $nameController = "tecnico";
    protected $user;

    //vars index
    protected  $name;
    protected  $empresa;
    protected  $correo;

    protected $model;

    public function __construct()
    {
        session_start();

        $this->model = $this->loadModels('datosHome');
        $this->user = $_SESSION["usuarioActual"];
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
<?php

class AdministradorController {

    protected $nameController = "administrador";

    //vars index
    protected  $name     = "Nombre Administrador";
    protected  $empresa  = "Nombre Empresa";
    protected  $correo   = "Correo Usuario";

    //HOME
    public function indexAction()
    {
        return new View('home', $this->getNameController(),[

            'nombre' => $this->getName(),
            'empresa' => $this->getEmpresa(),
            'correo' => $this->getCorreo()

        ]);
    }

    public function modifyUserAction()
    {
        return new View('modifyUser', $this->getNameController());
    }

    public function addUserAction()
    {
        return new View('addUser', $this->getNameController());
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->getNameController());
    }

    public function reportsAction()
    {
        return new View('reports', $this->getNameController());
    }


    /*
     * GETTERS
     */

    public function getCorreo()
    {
        return $this->correo;
    }


    public function getEmpresa()
    {
        return $this->empresa;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getNameController()
    {
        return $this->nameController;
    }




}
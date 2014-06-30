<?php

class TecnicoController {

    protected $nameController = "tecnico";

    //vars index
    protected  $name     = "Nombre Tecnico";
    protected  $empresa  = "Nombre Empresa";
    protected  $correo   = "Correo Usuario";


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
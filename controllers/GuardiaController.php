<?php

class GuardiaController extends BaseController {

    protected $nameController = "guardia";

    //vars index
    protected $name  = "Nombre Guardia";
    protected $correo = "Correo Usuario";


    public function indexAction()
    {

        return new View('home', $this->getNameController(), [

            'nombre' => $this->getName(),
            'correo' => $this->getCorreo()

        ]);

    }

    /*
     * GETTERS
     */

    public function getCorreo()
    {
        return $this->correo;
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

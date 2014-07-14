<?php

class OperadorDocController extends BaseController {

    protected $nameController = "operadorDoc";

    //vars index
    protected  $nameOperator   = "Nombre operador Doc";
    protected  $correo         = "Correo Usuario";

    // HOME
   public function indexAction()
    {

        return new View('home',$this->getNameController(), [

            'nombre' => $this->getNameOperator(),
            'correo' => $this->getCorreo()

        ]);
    }

    // ACTION
    public function modifyUserAction()
    {
        return new View('modifyUser',$this->getNameController());
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->getNameController());
    }

    public function addUserAction()
    {
        return new View('addUser', $this->getNameController());
    }

    public function visitsAction()
    {
        return new View('visits', $this->getNameController());
    }

    public function viewVisitsAction()
    {
        return new View('viewVisits',$this->getNameController() );
    }

    public function reportsAction()
    {
        return new View('reports', $this->getNameController());
    }


    /*
     * GETTER
     */

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNameController()
    {
        return $this->nameController;
    }

    public function getNameOperator()
    {
        return $this->nameOperator;
    }



}


<?php

class OperadorDocController {

    protected $nameController = "operadorDoc";


    // HOME
   public function indexAction()
    {
            //View($template, $controlador)
        return new View('home',$this->nameController);
    }

    // ACTION
    public function modifyUserAction()
    {
        return new View('modifyUser',$this->nameController);
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->nameController);
    }

    public function addUserAction()
    {
        return new View('addUser', $this->nameController);
    }

    public function visitsAction()
    {
        return new View('visits', $this->nameController);
    }

    public function reportsAction()
    {
        return new View('reports', $this->nameController);
    }

}


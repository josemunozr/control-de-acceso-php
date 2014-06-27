<?php

class AdministradorController {

    protected $nameController = "administrador";

    //HOME
    public function indexAction()
    {
        return new View('home', $this->nameController);
    }

    public function modifyUserAction()
    {
        return new View('modifyUser', $this->nameController);
    }

    public function addUserAction()
    {
        return new View('addUser', $this->nameController);
    }

    public function accessRequestAction()
    {
        return new View('accessRequest', $this->nameController);
    }

    public function reportsAction()
    {
        return new View('reports', $this->nameController);
    }
}
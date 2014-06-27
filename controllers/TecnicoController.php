<?php

class TecnicoController {

    protected $nameController = "tecnico";

    public function indexAction(){

        return new View('home' , $this->nameController);

    }

    public function accessRequestAction(){

        return new View('accessRequest' , $this->nameController);

    }

}
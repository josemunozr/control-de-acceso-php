<?php

class GuardiaController {

    protected $nameController = "guardia";

    public function indexAction()
    {

        return new View('home', $this->nameController);

    }

}

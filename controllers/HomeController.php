<?php

class HomeController {

    protected $nameController = "home";

    public function indexAction()
    {
          return new View('index', $this->nameController);
    }

    public function errorAction()
    {
        return new View('error', $this->nameController);
    }

}

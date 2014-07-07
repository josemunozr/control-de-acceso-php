<?php

class HomeController {

    protected $nameController = "home";

    public function indexAction()
    {
          return new View('index', $this->nameController);
    }




}

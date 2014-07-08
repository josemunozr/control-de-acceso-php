<?php

class HomeController extends BaseController {

    protected $nameController = "home";

    public function indexAction()
    {
          return new View('index', $this->nameController);
    }




}

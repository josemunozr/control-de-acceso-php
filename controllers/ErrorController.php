<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 12:40 PM
 */

class ErrorController {

    protected $nameController = "error";
    //protected $datos = LoginModels::getDatos();

    public function indexAction()
    {
           return new View('error', $this->nameController);
    }

}
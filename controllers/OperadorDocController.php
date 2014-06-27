<?php

class OperadorDocController {

    public function indexAction()
    {
        return new View('operadorDoc');
    }


   /* public function indexAction()
    {
        return new View('operadorDoc','home');
    }
*/
    public function modifyUserAction()
    {
        return new View('modifyUser');
    }

    public function accessRequestAction()
    {
        return new View('accessRequest');
    }

}


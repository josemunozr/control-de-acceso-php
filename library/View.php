<?php

class View extends Response{

    protected $template;
    protected $vars = array();
    protected $controller ;

    public function __construct($template,$controller, $vars = array())
    {
        $this->template = $template;
        $this->controller = $controller;
        $this->vars     = $vars;

    }

    /*public function __construct($template, $vars = array())
    {
        $this->template = $template;

        $this->vars     = $vars;

    }
*/

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     * */
    public function getController()
    {
        return $this->controller;
    }



    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    public function execute()
    {
        $template = $this->getTemplate();
        $controller = $this->getController();
        $vars     = $this->getVars();

        call_user_func(function() use ($template, $controller, $vars){

            //extract($controller);
            extract($vars);

            ob_start();

            //require "views/$template.tpl.php";

              require "views/$controller/$template.tpl.php";
            $tpl_content = ob_get_clean();

            //die($tpl_content);
            if($this->getTemplate() == 'index')
            {
                require "views/layout/layoutLogin.tpl.php";
            }
            else
            {
                require "views/layout/layout.tpl.php";
            }


        });
    }


}
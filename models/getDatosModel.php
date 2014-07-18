<?php

class getDatosModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getListEmpresa()
    {
        $sql = $this->_db->query("SELECT cod_emp,nombre FROM empresa");
        return $sql->fetchAll();
    }

}
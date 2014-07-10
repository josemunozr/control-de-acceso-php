<?php

class ControllModel extends Model {

    public function _construct()
    {
        parent::__construct();
    }

    public function getUser($usuario)
    {

        $sql_user = $this->_db->prepare("SELECT id_user FROM tabla_user
                                    WHERE id_user = '$usuario'");
        $sql_user->execute();
        $sql = $sql_user->fetch();

        return $sql;
    }

    public function validateUser($usuario)
    {
        $sql_user = $this->_db->prepare("SELECT id_user FROM tabla_user
                                    WHERE id_user = '$usuario'");
        $sql_user->execute();
        $sql = $sql_user->rowCount();

        return $sql;
    }

    public function validatePass($usuario, $pass)
    {
        $sql_pass = $this->_db->prepare("SELECT id_user FROM tabla_user
                                    WHERE id_user = '$usuario'
                                    AND   pass_user  = '$pass'");

        $sql_pass->execute();
        $sql = $sql_pass->rowCount();
        return $sql;
    }

    public function getPerfil($usuario)
    {
         $sql_perfil = $this->_db->prepare("SELECT tipo_perfil FROM tabla_user
                                         WHERE id_user = '$usuario'");

        $sql_perfil->execute();
        $sql = $sql_perfil->fetch();
        return $sql;
    }

}
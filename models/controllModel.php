<?php

class ControllModel extends Model {

    public function _construct()
    {
        parent::__construct();
    }

    public function getUser($usuario, $pass)
    {

        $sql_user = $this->_db->prepare("SELECT id_user,pass_user FROM tabla_user
                                    WHERE id_user = '$usuario'
                                    AND   pass_user  = '$pass'");
        $sql_user->execute();
        $sql = $sql_user->fetchAll();

        return $sql;
    }

    public function getPerfil($usuario, $pass)
    {
         $sql_perfil = $this->_db->prepare("SELECT tipo_perfil FROM tabla_user
                                         WHERE id_user = '$usuario'
                                         AND   pass_user  = '$pass'");

        $sql_perfil->execute();
        $sql = $sql_perfil->fetchAll();
        return $sql;
    }
}
<?php

class ControllModel extends Model {

    public function _construct()
    {
        parent::__construct();
    }

    public function getUser($usuario, $pass)
    {

        $sql_user = $this->_db->query("SELECT id_user,pass_user FROM tabla_user
                                    WHERE id_user = $usuario
                                    AND   pass_user  = $pass");

        return $sql_user->fetchall();

    }

    public function getPerfil($usuario, $pass)
    {
         $sql_perfil = $this->_db->query("SELECT tipo_perfil FROM tabla_user
                                         WHERE id_user = $usuario
                                         AND   pass_user  = $pass");

        return $sql_perfil->fetch();
    }
}
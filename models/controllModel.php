<?php

class ControllModel extends Model {

    public function _construct()
    {
        parent::__construct();
    }

    public function getUser($usuario)
    {

        $sql_user = $this->_db->prepare("SELECT cod_usu FROM usuario
                                    WHERE cod_usu = '$usuario'");
        $sql_user->execute();
        $sql = $sql_user->fetch();

        return $sql;
    }

    public function validateUser($usuario)
    {
        $sql_user = $this->_db->prepare("SELECT cod_usu FROM usuario
                                    WHERE cod_usu = '$usuario'");
        $sql_user->execute();
        $sql = $sql_user->rowCount();

        return $sql;
    }

    public function validatePass($usuario, $pass)
    {
        $sql_pass = $this->_db->prepare("SELECT cod_usu FROM usuario
                                    WHERE cod_usu = '$usuario'
                                    AND   pwd  = '$pass'");

        $sql_pass->execute();
        $sql = $sql_pass->rowCount();
        return $sql;
    }

    public function getPerfil($usuario)
    {
         $sql_perfil = $this->_db->prepare("SELECT cod_TipPer FROM usuario
                                         WHERE cod_usu = '$usuario'");

        $sql_perfil->execute();
        $sql = $sql_perfil->fetch();
        return $sql;
    }

}
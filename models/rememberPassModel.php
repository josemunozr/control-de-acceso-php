<?php

class RememberPassModel extends Model {

    public function __construct()
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

    public function validateCorreo($correo)
    {
        $sql_user = $this->_db->prepare("SELECT correo FROM usuario
                                    WHERE correo = '$correo'");
        $sql_user->execute();
        $sql = $sql_user->rowCount();

        return $sql;
    }

    public function getCorreo($usuario)
    {
        $sql_user = $this->_db->prepare("SELECT correo FROM usuario
                                    WHERE cod_usu = '$usuario'");
        $sql_user->execute();
        $sql = $sql_user->fetch();

        return $sql;
    }

}
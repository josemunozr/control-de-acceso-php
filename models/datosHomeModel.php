<?php

class datosHomeModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getNombreApellidoUser($usuario)
    {
        $sql_datos = $this->_db->prepare("SELECT nombre,apellido FROM usuario
                                    WHERE cod_usu = '$usuario'");
        $sql_datos->execute();
        $sql = $sql_datos->fetch();

        return $sql;
    }

    public function getCorreoUser($usuario)
    {
        $sql_datos = $this->_db->prepare("SELECT correo FROM usuario
                                    WHERE cod_usu = '$usuario'");
        $sql_datos->execute();
        $sql = $sql_datos->fetch();

        return $sql;
    }

    public function getNombreEmpresaUser($usuario)
    {
        $sql_datos = $this->_db->prepare("SELECT empresa.nombre FROM usuario,empresa
                                    WHERE empresa.cod_emp = usuario.cod_emp
                                    AND cod_usu = '$usuario'");
        $sql_datos->execute();
        $sql = $sql_datos->fetch();

        return $sql;
    }

}
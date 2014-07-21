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

    public function getVisitsEmpresa($emp,$fecha)
    {
        $sql = $this->_db->query("SELECT usuarioagendado.cod_usu AS rutUsuario,usuario.nombre, usuario.apellido,empresa.nombre AS nombreEmpresa
                                  FROM usuarioagendado,usuario,agendamiento,empresa
                                  WHERE usuario.cod_usu = usuarioagendado.cod_usu
                                  AND usuario.cod_emp = empresa.cod_emp
                                  AND  usuarioagendado.cod_UsuAgenda = agendamiento.cod_Age
                                  AND usuarioagendado.estadou = 'agendado'
                                  AND empresa.cod_emp = '$emp'
                                  AND agendamiento.fecha = '$fecha'");


        return $sql->fetchAll();


    }

}
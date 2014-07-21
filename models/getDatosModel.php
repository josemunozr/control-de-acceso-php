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

    public function getDataAplicant($desde,$hasta,$empresa)
    {
        $sql = $this->_db->query("SELECT cod_Age AS num, cod_UsuSoli AS rut_Solicitante, motivo, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha, hora, estado AS estado_Visita
                                  FROM agendamiento
                                  WHERE fecha BETWEEN '$desde' AND '$hasta'
                                  AND cod_emp = '$empresa'");

        //WHERE fecha BETWEEN '2014/02/20' AND '2014/07/04'
        //AND cod_emp = '88381200-k'");



        return $sql->fetchAll();
    }

    public function getDataVisits($desde,$hasta,$empresa)
    {
        $sql = $this->_db->query("SELECT cod_Age AS numero, usuarioagendado.cod_usu AS Rut_Usuario, nombre, apellido, estadou AS estado_Visita
                                  FROM agendamiento, usuarioagendado, usuario
                                  WHERE usuario.cod_usu = usuarioagendado.cod_usu
                                  AND usuarioagendado.cod_UsuAgenda = agendamiento.cod_Age
                                  AND fecha BETWEEN '$desde' AND '$hasta'
                                  AND agendamiento.cod_emp = '$empresa'");

        return $sql->fetchAll();
    }




}
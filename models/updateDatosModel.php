<?php

class updateDatosModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function modifyUserByRut($tipoPerfil,$fechaInicio,$fechaFin, $rutUsuario)
    {
        $sql = $this->_db->prepare("UPDATE usuario
                                    SET cod_TipPer = :tipoPerfil, date_ini = :fechaInicio, date_fin = :fechaFin
                                    WHERE cod_usu = :rutUsuario")
                    ->execute(array(
                        ':tipoPerfil' => $tipoPerfil,
                        ':fechaInicio' => $fechaInicio,
                        ':fechaFin' => $fechaFin,
                        ':rutUsuario' => $rutUsuario
                    ));


        return $sql;


    }

    public function modifyUserByNomApe($tipoPerfil,$fechaInicio,$fechaFin,$nombre,$apellido)
    {
        $sql = $this->_db->prepare("UPDATE usuario
                                    SET cod_TipPer = :tipoPerfil, date_ini = :fechaInicio, date_fin = :fechaFin
                                    WHERE nombre = :nombre
                                    AND apellido = :apellido")
            ->execute(array(
                ':tipoPerfil' => $tipoPerfil,
                ':fechaInicio' => $fechaInicio,
                ':fechaFin' => $fechaFin,
                ':nombre' => $nombre,
                ':apellido' => $apellido
            ));


        return $sql;
    }


    public function modifyStatus($usuario)
    {
        $sql = $this->_db->prepare("UPDATE usuarioagendado
                                    SET estadou = 'realizado'
                                    WHERE cod_usu = :usuario")
            ->execute(array(
                ':usuario' => $usuario
            ));

        return $sql;
    }

}
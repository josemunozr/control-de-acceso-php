<?php

class setDatosModel extends Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($usuario,$name,$apellido,$dateIni,$dateFin,$pass,$tipoPerfil,$codEmp)
    {
        $sql = $this->_db->prepare("INSERT INTO usuario VALUES (:usuario,:nombre,:apellido,:dateIni,:dateFin,:pass,:tipoPerfil,:codEmp,NULL )")
            ->execute(
                array(
                    ':usuario' => $usuario,
                    ':nombre'  => $name,
                    ':apellido' => $apellido,
                    ':dateIni' =>  $dateIni,
                    ':dateFin' => $dateFin,
                    ':pass' => $pass,
                    ':tipoPerfil' => $tipoPerfil,
                    ':codEmp' => $codEmp

                ));

        return $sql;


    }

}
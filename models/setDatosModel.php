<?php

class setDatosModel extends Model {


    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($usuario,$name,$apellido,$dateIni,$dateFin,$pass,$tipoPerfil,$codEmp,$correo)
    {
        $sql = $this->_db->prepare("INSERT INTO usuario VALUES (:usuario,:nombre,:apellido,:dateIni,:dateFin,:pass,:tipoPerfil,:codEmp,:correo )")
            ->execute(
                array(
                    ':usuario' => $usuario,
                    ':nombre'  => $name,
                    ':apellido' => $apellido,
                    ':dateIni' =>  $dateIni,
                    ':dateFin' => $dateFin,
                    ':pass' => $pass,
                    ':tipoPerfil' => $tipoPerfil,
                    ':codEmp' => $codEmp,
                    ':correo' => $correo
                ));



        return $sql;


    }

    public function accessRequest($cantUser,$dataUser=array(),$rutEmp,$RutSolicitante,$motivo,$fecha,$hora)
    {
        //var_dump($rutEmp . ' // ' . $RutSolicitante );
        //exit;


        $sql_agendamiento = $this->_db->prepare("INSERT INTO agendamiento(cod_emp, cod_UsuSoli, motivo, fecha, hora, estado)
                                                    VALUES (:rutEmp, :rutSolicitante,:motivo, :fecha,:hora, :estado)")
                           ->execute(array(
                                    ':rutEmp' => $rutEmp,
                                    ':rutSolicitante' => $RutSolicitante,
                                    ':motivo' => $motivo,
                                    ':fecha' => $fecha,
                                    ':hora' => $hora,
                                    ':estado' => 'agendado'
                                ));

           // var_dump($sql_agendamiento);


        $sql_codAgendamiento = $this->_db->prepare("SELECT cod_Age FROM agendamiento
                                                  WHERE cod_UsuSoli = '$RutSolicitante'
                                                  AND hora = '$hora'");

        $sql_codAgendamiento->execute();

        $codAgen = $sql_codAgendamiento->fetch(); // $codAgen["cod_Age"]


        for($i=1;$i<=$cantUser; $i++)
        {


            $sql_usuario = $this->_db->prepare("INSERT INTO usuario (cod_usu, nombre, apellido, date_ini,date_fin,pwd,cod_TipPer,cod_emp,correo)
                                            VALUES (:rutUsuario,:nombre,:apellido,NULL,NULL,NULL,'5',:rutEmpresa,NULL)")
                ->execute(array(
                    ':rutUsuario' => $dataUser[$i]["rut$i"],
                    ':nombre' => $dataUser[$i]["nombre$i"],
                    ':apellido' => $dataUser[$i]["apellido$i"],
                    ':rutEmpresa' => $rutEmp

                ));


            //var_dump($sql_usuario);

            $sql_usuarioAgendado = $this->_db->prepare("INSERT INTO UsuarioAgendado (cod_UsuAgenda,cod_usu,estadou)
                                                    VALUES (:codAgendamiento,:rutUsuario,'agendado')")
                             ->execute(array(

                                    ':codAgendamiento' => $codAgen["cod_Age"],
                                    ':rutUsuario' => $dataUser[$i]["rut$i"]

                             ));
           // var_dump($sql_usuarioAgendado);
        }





        if( ($sql_agendamiento && $sql_usuario && $sql_usuarioAgendado) == true)
        {
            return true;
        }
        else
        {
            return false;
        }







        //return $sql_usuario;

    }






}
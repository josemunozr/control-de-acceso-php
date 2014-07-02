<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 11:01 AM
 */

class Database {

    protected $conexion;

    public function __construct(){

       $this->conexion();

    }

    public function conexion()
    {

       $this->conexion =  mysql_connect(DB_HOST, DB_USER , DB_PASS)
         or die('No se puede conectar Database' . mysql_error());

       mysql_select_db(DB_NAME, $this->conexion)
         or die('No se pudo selexionar DB'. mysql_error());

    }

}
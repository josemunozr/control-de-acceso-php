<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 12:58 PM
 */

class LoginModels extends Model {



    public function __construct()
    {
        parent::__construct();

    }

    public function getDatos()
    {

       $conn = $this->db;

       $query = 'SELECT * FROM table_usuario';
       $result = mysql_query($query, $conn  ) or die('Consulta fallida: ' . mysql_error());
       return $result;

    }

}
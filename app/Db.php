<?php

class Db extends PDO {

    /*public function __construc()
    {
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(mysqli_connect_errno($mysqli))
        {
            echo "Fallo al conectar a Mysql: " . mysqli_connect_errno();
        }

        return $mysqli;
    }
    */
    public function __construct()
    {
        parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

}
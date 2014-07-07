<?php

class Db {

    public function __construc()
    {
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(mysqli_connect_errno($mysqli))
        {
            echo "Fallo al conectar a Mysql: " . mysqli_connect_errno();
        }
    }

}
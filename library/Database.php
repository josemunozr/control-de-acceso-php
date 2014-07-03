<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 11:01 AM
 */

class Database extends PDO {

    public function __construct() {

        parent::__construct(
            'mysql:host=' . DB_HOST .
            ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS);

    }
}
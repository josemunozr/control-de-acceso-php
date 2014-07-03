<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 11:15 AM
 */

class Model {

    protected $_db;

    public function __construct()
    {
        $this->_db = new Database();

    }

}
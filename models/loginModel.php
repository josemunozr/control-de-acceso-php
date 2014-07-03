<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 12:58 PM
 */

class LoginModel extends Model {

    protected $_post;

    public function __construct()
    {
        parent::__construct();

    }

    public function getDatos()
    {
        $post = $this->_db->query('select * from posts');
        return $post->fetchall();

    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 08/03/2016
 * Time: 21:55
 */

class Connection extends mysqli {

    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connect_error ? die('Error en la conection a la DB') : null;
//        $this->query('SET NAMES utf8');
        $this->set_charset('utf8');
    }

    public function  rows($query)
    {
        return mysqli_num_rows($query);
    }

    public function liberar($query)
    {
        return mysqli_free_result($query);
    }

    public function recorrer($query)
    {
        return mysqli_fetch_array($query);
    }
}
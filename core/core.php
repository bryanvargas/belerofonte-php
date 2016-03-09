<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 26/02/2016
 * Time: 21:13
 */
session_start();
//constantes de conexion
define('DB_HOST', 'localhost');
define('DB_USER', 'shingo');
define('DB_PASS', 'vic00to00ria00@');
define('DB_NAME', 'belerofontedb');

//constantes de la app
define('HTML_DIR', 'html/');
define('APP_TITLE', 'Belerofonte');
define('APP_COPY', 'Copyright &copy; ' . date('Y', time()) . ' ');
define('APP_URL', 'http://localhost:8086/curso_php_mx/OcrendBB/');


//estructura de la app
require('vendor/autoload.php');
require('core/models/class.Connection.php');
require('core/bin/functions/Encript.php');
require('core/bin/functions/Users.php');

$users = Users();



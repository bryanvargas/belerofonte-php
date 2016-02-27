<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 26/02/2016
 * Time: 18:47
 */
require 'core/core.php';

if(isset($_GET['view'])){
    if(file_exists('core/controllers/'. strtolower($_GET['view']) . 'controller.php')) {
        include 'core/controllers/' . strtolower($_GET['view'] . 'controller.php');
    } else {
        include 'core/controllers/errorController.php';
    }
} else {
    include 'core/controllers/indexController.php';
}
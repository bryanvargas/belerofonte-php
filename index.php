<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 26/02/2016
 * Time: 18:47
 */
require 'core/core.php';

//echo Encript('1233454');
//echo $_SESSION['app_id'];

if(isset($_GET['view'])){
    if(file_exists('core/controllers/'. strtolower($_GET['view']) . 'controller.php')) {
        include 'core/controllers/' . strtolower($_GET['view'] . 'controller.php');
    } else {
        include 'core/controllers/errorController.php';
    }
} else {
    include 'core/controllers/indexController.php';
}


//https://www.youtube.com/watch?v=GQM4BwpsRfY&list=PLDQZoQpLCoUCYnpXztWrSVPu5eVqISHDr&index=6&feature=iv&src_vid=FcL4u-1KCZM&annotation_id=annotation_1784312683
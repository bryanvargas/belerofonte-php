<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 26/02/2016
 * Time: 18:48
 */

if(isset($_POST)) {
   require('core/core.php');
   switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'login' :
         require 'core/bin/ajax/goLogin.php';
         break;
      default:
         header('location: index.php');
         break;
   }
} else  {
   header('location: index.php');
}

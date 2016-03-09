<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 29/02/2016
 * Time: 21:46*/


if(!empty($_POST['user']) AND !empty($_POST['pass'])) {
    $db =  new Connection();
    $data =  $db->real_escape_string($_POST['user']);
    $pass =  Encript($_POST['pass']);
    $sql = $db->query("SELECT id FROM users WHERE (user='$data' OR email='$data') AND pass='$pass' LIMIT 1");
    if($db->rows($sql)>0) {
        //esto va a manejar la id del usuario
        if($_POST['sesion']) {
            ini_set('session.cookie_lifetime',time() + (60*60*24));
            $_SESSION['app_id'] = $db->recorrer($sql)[0];
        }
        echo 1;
    } else {
        echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Error!</strong> La credenciales son incorrectas
          </div>';
    }
    $db->liberar($sql);
    $db->close();
} else {
    echo '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Error!</strong> Todos los datos deben estar llenos
          </div>';
}

<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 09/03/2016
 * Time: 0:35
 */

function Users()
{
    $db = new Connection();
    $sql = $db->query('SELECT * FROM users');
    if($db->rows($sql) > 0) {
        while($d = $db->recorrer($sql)){
            $users[$d['id']] =  array(
                'id'=>$d['id'],
                'user' => $d['user'],
                'pass' => $d['pass'],
                'email' => $d['email'],
                'permisos' => $d['permisos']
            );
        }
    } else {
        $user = false;
    }
    $db->liberar($sql);
    $db->close();

    return $users;
}
<?php
/**
 * Created by PhpStorm.
 * User: Shingo
 * Date: 08/03/2016
 * Time: 22:26
 */

function Encript($string)
{
    $long =  strlen($string);
    $str = '';
    for($x = 0; $x < $long; $x++){
        $str .= ($x%2) != 0 ? md5($string[$x]):$x;
    }
    return md5($str);
}
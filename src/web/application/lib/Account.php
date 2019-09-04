<?php

function str_clr($str){
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    $str = trim($str);

    return $str;

}
<?php 
session_start();
require 'rb/rb.php';

R::setup( 'mysql:host=localhost; dbname=alimdzmn_db', 'alimdzmn_db', 'lGWh35*Z');
// R::setup( 'mysql:host=localhost; dbname=dombra_db', 'root', '');

if (!R::testConnection()) {
    exit('Нет подключения к БД');
}

function formatstr($str){
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    return $str;
}

?>

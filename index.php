<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Замеряю время работы скрипта
$t_start = microtime(true );

// Редиректы безусловные
$r301 = "rem273.ru:sm23.ru,hello.ru:goto.me";
if( preg_match( "/{$_SERVER['SERVER_NAME']}:([^,]*)/", $r301, $go )){
    header("HTTP/1.1 301 Moved Permanently");
    header( "Location: https://{$go[1]}" );
    exit;
}

// Вытаскиваю домен, тему
$db_city = new mysqli( 'localhost', 'cc66283_pro', 'PRO_cc66283', 'cc66283_pro' );

// Настройки темы
$ws = new WebSite();

class WebSite{

    function __construct()
    {
        
    }

}
// $db_data = new mysqli( "localhost", "cc66283_{$set_arr['theme_en']}", "PRO_cc66283", "cc66283_{$set_arr['theme_en']}" );


// Дебаг, время/память
echo "<!-- T: " . ( microtime(true) - $t_start ) . " sec-->\n";
echo "<!-- T: " .(memory_get_usage() / 1000) . " sec-->";
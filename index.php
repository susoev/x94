<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Замеряю время работы скрипта
$t_start = microtime(true );

// Редиректы безусловные
// !! ДОБАВЬ ПУТЬ
$r301 = "rem273.ru:sm23.ru,hello.ru:goto.me";
if( preg_match( "/{$_SERVER['SERVER_NAME']}:([^,]*)/", $r301, $go )){
    header("HTTP/1.1 301 Moved Permanently");
    header( "Location: https://{$go[1]}" );
    exit;
}

// Настройки базы, прочие дефолты
include_once("set_up.php")

// Настройки темы
$ws = new WebSite( $db );
$ws->show_set();

class WebSite{

    // Настройки сайта
    public $set_arr;

    function __construct( $db )
    {
        $this->set_arr = $db->query("select * from `cities` as c, `themes` as t where t.theme_en = c.theme_en AND c.`domain`='{$_SERVER['SERVER_NAME']}'")->fetch_array( MYSQLI_ASSOC );
        if(empty( $this->set_arr )) exit("Ошибка: Этот сайт пока не работает");
    }

    // Выводит настройки сайта
    function show_set(){
        echo "<!--DEBUG";
        print_r( $this->set_arr );
        echo "-->";
    }

}
// $db_data = new mysqli( "localhost", "cc66283_{$set_arr['theme_en']}", "PRO_cc66283", "cc66283_{$set_arr['theme_en']}" );


// Дебаг, время/память
echo "<!-- T: " . ( microtime(true) - $t_start ) . " sec-->\n";
echo "<!-- T: " .(memory_get_usage() / 1000) . " sec-->";
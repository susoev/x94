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
include_once("set_up.php");

// ИНИТ
$ws = new WebSite( $db );
$ws->show_set();

class WebSite{

    public $sa;        // Site Array Настройки сайта
    public $pa;        // Page Array Настройки запрошенной страницы
    public $url;       // Урл из REQUEST_URI

   // Выводит настройки сайта
    function show_set(){
        echo "<!--DEBUG";
        print_r( $this->sa );
        echo "-->";
    }

    // Достаю настройки сайта, темы и самой страницы
    function __construct( $db )
    {
        // Этот экземпляр сайта
        $this->sa = $db->query("select * from `sites` as c, `themes` as t where t.theme_en = c.theme_en AND c.`domain`='{$_SERVER['SERVER_NAME']}'")->fetch_array( MYSQLI_ASSOC );
        if(empty( $this->sa )) exit("Ошибка: Этот сайт пока не работает");

        // Эта страница
        $this->url = ( !empty( $_REQUEST["p"] ) ? $_REQUEST["p"] : "main" );

        // Настройки страницы
        $this->pa = $db->query("select * from `{$this->sa['country']}_{$this->sa['theme_en']}_pages` where `url`='{$this->url}'");

        // Robots.txt // SiteMap.xml
        // !! Сделай что нибудь поумнее, это не правильно
        if ( $this->url == "robots.txt" ){ include_once( "inc/_robots.php" ); exit; }
        if ( $this->url == "sitemap.xml" ){ include_once( "inc/_sitemap.php" ); exit; }

    }

}
// $db_data = new mysqli( "localhost", "cc66283_{$sa['theme_en']}", "PRO_cc66283", "cc66283_{$sa['theme_en']}" );


// Дебаг, время/память
echo "\n<!-- Time: " . ( microtime(true) - $t_start ) . " sec-->";
echo "\n<!-- Memo: " .(memory_get_usage() / 1000) . " Kb-->";
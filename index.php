<?php

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Замеряю время работы скрипта
$t_start = microtime(true );

// Настройки базы, прочие дефолты
include_once("set_up.php");

// Добывает сайт
$ws = new WebSite( $db );

// Подключает языковые настройки
include_once("src/lang_{$ws->sa['country']}.php");

// Добывает страницу
$ws->get_page();

// Рисует страницу
$ws->inc_page();

// Дебаг
$ws->show_set();

class WebSite{

    public $db;
    public $sa;        // Site Array Настройки сайта
    public $pa;        // Page Array Настройки запрошенной страницы
    public $url;       // Урл из REQUEST_URI
    public $ua;        // Url Array если чпу > 1 позиции

    // Собираю страничку
    public function inc_page(){

        // Если один, подключаю и выхожу
        if($this->pa['stand_alone']){
            include_once( "inc/{$this->pa['fpath']}" );
            exit;
        }

        include_once ("templates/default/header.php");
        include_once ("templates/default/{$this->pa['fpath']}.php");
        include_once ("templates/default/footer.php");

        return true;
    }

    function get_product(){
        return false;
    }

    // Выдаёт текущий месяц в нужном падеже
    function this_month( $pa ){
        global $mon_arr;
        return $mon_arr[$pa][date("m")];

    }

    // Переписывает замены, прохожу по настройкам, если встречает $, переписывает
    function set_replacer($arr){

        foreach ( $arr as $key => $val){

            // Переписываю цифры #900 руб.
            if( preg_match_all( '/#([0-9]{2,})/', $val, $m ) )
                foreach( $m[1] as $v0 ) $val = preg_replace( "/#{$v0}/", ceil( ( 1 + 0.001 * $this->sa['ko'] ) * $v0 ), $val );


            // Переписываю месяцы вида #mod/#mor месяц в дательном падеже
            if( preg_match( '/#mo([r|d])/', $val, $matches ) )
                $val = str_replace( $matches[0], $this->this_month( $matches[1] ), $val );

            // Подмены из настроек
            if(preg_match('/\$/', $val ))
                foreach ( $this->sa as $k => $v ) $val = str_replace("\${$k}", $v, $val);


            // Переписываю год
            $val = str_replace( "#y", date( "Y" ), $val );

            $arr[$key] = $val;

        }

        return $arr;
    }

    // Настройки страницы
    public function get_page(){

        if ( $this->url == "robots.txt" ) include_once( "inc/_robots.php" );
        if ( $this->url == "sitemap.xml" ) include_once( "inc/_sitemap.php" );

        // Продуктовая страница
        if ( $this->url == "product" ) $this->get_product();

        // Сначала пробует весь чпу как есть
        $pa = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='{$this->url}'")->fetch_array( MYSQLI_ASSOC );

        // Если нет результата и есть чпу, пробует ЧПУ по частям достает product из product/exact_product
        if(empty($pa) && (!empty($this->ua)))
            $pa = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='{$this->ua[0]}'")->fetch_array( MYSQLI_ASSOC );

        // Если нет результата, 404
        if(empty($pa))
            $pa = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='404'")->fetch_array( MYSQLI_ASSOC );

        // Переписываю подмены
        $this->pa = $this->set_replacer($pa);


        // !! Сделай что нибудь поумнее, для product и gallery сделайй что то
    }

   // Выводит настройки сайта
    function show_set(){
        echo "<!--DEBUG\n";
        print_r( $this->ua );
        print_r( $this->url );
        print_r( $this->pa );
        print_r( $this->sa );
        echo "\n-->";
    }

    // Достает настройки сайта, темы и самой страницы
    function __construct( $db )
    {
        $this->db = $db;

        // Этот экземпляр сайта
        $this->sa = $db->query("select * from `sites` as c, `themes` as t where t.theme = c.theme AND c.`domain`='{$_SERVER['SERVER_NAME']}'")->fetch_array( MYSQLI_ASSOC );

        // Редирект на другой сайт, если есть настройка
        if(empty($this->sa['cname'])){
            header("HTTP/1.1 301 Moved Permanently");
            header( "Location: {$this->sa['obl_im']}{$_SERVER['REQUEST_URI']}" );
            exit;
        }

        // Если не находит сайта
        if(empty( $this->sa )) exit("Ошибка: Этот сайт пока не работает");

       // Переписываю подмены
        $this->sa = $this->set_replacer($this->sa);

        // ЧПУ Эта страница
        $this->url = ( !empty( $_REQUEST["p"] ) ? $_REQUEST["p"] : "main" );

        // ЧПУ разделяет REQUEST_URI
        if( preg_match('/\//', $this->url )) $this->ua = explode("/", $this->url);

    }

}

// Дебаг, время/память
echo "\n<!-- Time: " . ( microtime(true) - $t_start ) . " sec-->";
echo "\n<!-- Memo: " .(memory_get_usage() / 1000000) . " Mb-->";
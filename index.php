<?php

class WebSite{

    public $db;
    public $la;        // Language Array языковой пакет
    public $sa;        // Site Array Настройки сайта
    public $pa;        // Page Array Настройки запрошенной страницы
    public $url;       // Урл из REQUEST_URI
    public $ua;        // Url Array если чпу > 1 позиции

    // !! Получение фавика, кавера, логотипа, сделай одной функцией
    // !! Убери пути в переменные в настройки

    // Оплата сайта
    public function is_paid(){

        // Проверяет через 6 дней после неоплаченного месяца
        return ( time() - strtotime( "last day of {$this->sa['paid_till']}" ) - 529200 ) < 0 ? true : false;
    }

    // Получает кавер картинку
    public function get_coverImg(){

        // сначала смотрим кавер по урлу внутри самой темы
        if( is_file( $img = "img/covers/{$this->sa['theme_id']}/{$this->url}.jpg" ) ) return "{$this->sa['bu']}{$img}";

        // Для product
        if( $this->url == ['product'] && is_file( $img = "img/products/{$this->sa['theme_id']}/big/{$this->pa['product_id']}.jpg" ) ) return "{$this->sa['bu']}{$img}";

        // Отдельно для обычной страницы и для /product
        return "{$this->sa['bu']}img/covers/main.jpg";
    }

    // Достаёт телефоны из пресета, и возвращает массив чистых
    public function clean_phones(){

        $arr = false;
        if(isset($this->sa['phone_num'])) $arr['p'] = substr( preg_replace('/\D/', '', $this->sa['phone_code'] . $this->sa['phone_num'] ), -10 );
        if(isset($this->sa['cell'])) $arr['c'] = substr( preg_replace('/\D/', '', $this->sa['cell'] ), -10 );
        return $arr;
    }

    // Собираю страничку
    public function inc_page(){

        if(!is_file("templates/{$this->pa['template']}/{$this->pa['fpath']}.php")) return "_no_inc";
        return $this->pa['fpath'];
    }

    function get_product(){
        return false;
    }

    // Выдаёт текущий месяц в нужном падеже
    function this_month( $pa ){
        return $this->la['month_arr'][$pa][date("m")];

    }

    // Переписывает замены внутри себя же, для метатегов страниц
    public function self_replacer(){

        // Прохожу по каждому элементу массива
        foreach ( $this->pa as $key => $val ){

            // Для каждого значения прохожу по массиву // И делаю замены
            foreach( $this->pa as $param => $replace_to ) $val = str_replace( "$" . $param, $replace_to, $val );

            $this->pa[$key] = $val;
        }

        return true;
    }

    // Переписывает замены, прохожу по настройкам, если встречает $, переписывает
    function set_replacer($arr){

        // Настройки, которые нужно преобразовать в массив
        global $json_replace;

        foreach ( $arr as $key => $val){

            // Json переменные, которые сразу преобразую в массив
            if( in_array($key, $json_replace)){

                if(is_string($val)) {
                    $arr[$key] = json_decode($val, true);
                    continue;
                }
            }

            // Переписываю цифры #900 руб.
            if( preg_match_all( '/#([0-9]{2,})/', $val, $m ) )
                foreach( $m[1] as $v0 ) $val = preg_replace( "/#{$v0}/", ceil( ( 1 + 0.001 * $this->sa['ko'] ) * $v0 ), $val );


            // Переписываю месяцы вида #mod/#mor месяц в дательном падеже
            if( preg_match( '/#mo([r|d])/', $val, $matches ) )
                $val = str_replace( $matches[0], $this->this_month( $matches[1] ), $val );

            // Подмены из настроек
            if(preg_match('/\$/', $val ))
                foreach ( $this->sa as $k => $v ){
                    if(!is_string($v)) continue;
                    $val = str_replace("\${$k}", $v, $val);
                }

            // Переписываю год
            $val = str_replace( "#y", date( "Y" ), $val );

            $arr[$key] = $val;

        }

        return $arr;
    }

    // Настройки страницы
    public function get_page(){

        // !! Сделай исключения в массив
        if ($this->url == "robots.txt" || $this->url == "sitemap.xml" || $this->url == "login" || $this->ua[0] == "login"){
            $this->pa['fpath'] = $this->ua[0] . ".php";
            $this->sa['stand_alone'] = 1;
            return true;
        }

        // Продуктовая страница !! На этом этапе нужно подменять все МЕТА из продукта
        if ( $this->url == "product" ){
            $this->get_product();
            return true;
        }

        // Сначала пробует весь чпу как есть
        $pa = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='{$this->url}'")->fetch_array( MYSQLI_ASSOC );

        // Если нет результата, 404
        if(empty($pa))
            $pa = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='404'")->fetch_array( MYSQLI_ASSOC );

        // Переписываю подмены
        $this->pa = $this->set_replacer($pa);

        // Переписываю подмены внутри метатегов
        $this->self_replacer();

        // Базовый урл
        $this->sa['bu'] = $this->sa['http'] . $this->sa['domain'] . "/";

        // Cover Image
        $this->sa['ci'] = $this->get_coverImg();

        // Тема
        $this->pa['template'] = $this->get_template();
    }

    // Выбираю тему для сайта
    public function get_template(){
        if(!empty($this->pa['template'])) return $this->pa['template'];
        if(!empty($this->sa['template'])) return $this->sa['template'];
        return "default";
    }

   // Выводит настройки сайта
    function show_set(){
        echo "<!--DEBUG\n";
        // print_r( $this->ua );
        print_r( $this->url );
        print_r( $this->pa );
        print_r( $this->sa );
        echo "\n-->";
    }

    // Достает настройки сайта, темы и самой страницы
    function __construct(){
        global $db;
        $this->db = $db;

        // Этот экземпляр сайта
        $this->sa = $db->query("select * from `sites` as c, `themes` as t where t.theme = c.theme AND c.`domain`='{$_SERVER['SERVER_NAME']}'")->fetch_array( MYSQLI_ASSOC );

        // Редирект на другой сайт, если есть настройка
        if(empty($this->sa['cname'])){
            header("HTTP/1.1 301 Moved Permanently");
            if(preg_match("/http/", $this->sa['obl_im'])) header( "Location: {$this->sa['obl_im']}{$_SERVER['REQUEST_URI']}" );
            exit("Ошибка: сайт переехал");
        }

        // Если не находит сайта
        if(empty( $this->sa )) exit("Ошибка: Этот сайт пока не работает");

       // Переписываю подмены
        $this->sa = $this->set_replacer($this->sa);

        // Добавляю очищенные телефоны
        $this->sa['cp'] = $this->clean_phones();

        // Оплата за сайт
        $this->sa['ip'] = $this->is_paid();

        // ЧПУ Эта страница, непонимаю почему здесь
        $this->url = ( !empty( $_REQUEST["p"] ) ? $_REQUEST["p"] : "main" );

        // Разделяет REQUEST_URI в массив
        $this->ua = explode("/", $this->url);

        // Логотип, если нет своего - использует общий
        $this->sa['logo'] = "img/logo/{$this->sa['theme_id']}/{$this->sa['site_id']}.png";
        if(!is_file($this->sa['logo'])) $this->sa['logo'] = "/img/logo/{$this->sa['theme_id']}/logo.png";

        // Фавикон, тоже самое
        $this->sa['fd'] = is_dir( "img/favicon/{$this->sa['site_id']}" ) ? $this->sa['site_id'] : $this->sa['theme_id'];

    }

}

class User{

    public $db;

    // Достаёт информацию по пользователю, возвращает массив
    public function get_user(){
        $ua = $this->db->query("select * from `{$this->sa['country']}_{$this->sa['theme']}_pages` where `url`='404'")->fetch_array( MYSQLI_ASSOC );
    }

    // Смотрит на наличие куки
    function __construct(){
        global $db;

        $this->db = $db;
        echo "Class_User";
    }
}

// Вывод ошибок, замеры работы скрипта
error_reporting( E_ALL ); ini_set( 'display_errors', 1 ); $t_start = microtime(true );

// Настройки базы, прочие дефолты
include_once("set_up.php");

// Добывает сайт
$ws = new WebSite();

// Если установлена кука, запускаю класс
if(!empty($_COOKIE['x94_user'])) $u = new User();

// Добывает страницу
$ws->get_page();

// Подключаем голову
if(empty($ws->sa['stand_alone'])) include_once ("templates/{$ws->pa['template']}/header.php");

// Шаблон файла
if(!empty($ws->pa['template'])){
    include_once ("templates/{$ws->pa['template']}/{$ws->inc_page()}.php");

// Или без шаблона
} else {
    include_once ("inc/{$ws->pa['fpath']}");
}
if(empty($ws->sa['stand_alone'])) include_once ("templates/{$ws->pa['template']}/footer.php");

// Дебаг
// $ws->show_set();

// Дебаг, время/память
echo "\n<!-- Time: " . ( microtime(true) - $t_start ) . " sec-->";
echo "\n<!-- Memo: " .(memory_get_usage() / 1000000) . " Mb-->";
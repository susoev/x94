<?php

$u = new User();

// Выходит если нет авторизации
if(!$u->get_user()) exit("<h3>{$ws->la['err_user_unauthorised']}</h3><a href='/login'>{$ws->la['login_title']}</a>");

// Панель управления
$p = new UserPanel();

// Вся магия здесь, если есть метод, после //domain.com/panel/XXX, то он выполняется
if (!empty($ws->ua[1])){
    if (method_exists ($p, $ws->ua[1])){
        $method = $ws->ua[1];
        $p->$method();
    }
}

// Верхнее меню
$top_menu = array('main','settings','orders','support','services');

// !! Сделай подмены языка на хидере/футере
include_once ("inc/panel/header.php");

include_once ("inc/panel/footer.php");
?>

                    <h3 class="mb-2">Панель управления</h3>
                    <p>Текст</p>

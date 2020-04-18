<?php

$u = new User();

// Выходит если нет авторизации
$u->check_auth();

// Панель управления
$p = new UserPanel();

// Подключаю настройки
include_once ("panel/settings.php");

// Вся магия здесь, если есть метод, после //domain.com/panel/XXX, то он выполняется
$ws->ua[1] = !empty($ws->ua[1]) ? $ws->ua[1] : "main";

if (method_exists ($p, $ws->ua[1])){
    $method = $ws->ua[1];
    $p->$method();
}

// !! Сделай подмены языка на хидере/футере
include_once ("inc/panel/header.php");
$p->body_feel();
include_once ("inc/panel/footer.php");
?>



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

?>
<!DOCTYPE html>
<html lang='<? echo $ws->sa['country']; ?>'>
    <head>
        <meta charset='utf-8'>
        <title><? echo $ws->la['login_title']; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <base href='/' />
        <link rel='stylesheet' href='/css/panel_main.css'>

        <script src='/js/jquery-3.2.1.min.js'></script>
        <script async src='/js/bootstrap.min.js'></script>
        <!--script async src='/js/main.js'></script-->
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample05" style="">
            <ul class="navbar-nav mr-auto">
                <?
                    // Класс active
                    $active = !empty($ws->ua[1]) ? $ws->ua[1] : "main";
                    foreach ($top_menu as $v){
                        $lnk = "lnk_{$v}";
                        echo "<li class='nav-item ".( $active == $v ? "active" : null)."'><a class='nav-link' href='/panel/{$v}'>{$ws->la[$lnk]}</a></li>";
                    }
                ?>
                <li class='nav-item'>
                    <a class="nav-link text-danger" href='/login'>Выход</a>
                </li>
            </ul>

        </div>
    </nav>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                    <h3>Панель управления</h3>
                </div>
            </div>
        </div>
    </body>
</html>

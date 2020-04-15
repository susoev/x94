<?

// Разлогин
setcookie( 'x94_user', null, -1 );
unset( $_COOKIE['x94_user'] );

// Запускаю класс
$u = new User();

// Дефолтная форма логина
$inc_file = "inc/login/form.php";

if(!empty($ws->ua[1])){

    // Отрабатывает методы из ЧПУ
    if (method_exists ($u, $ws->ua[1])){
        $method = $ws->ua[1];
        $u->$method();
    }

    // Подключаемый в теле
    if( is_file( "inc/login/{$ws->ua[1]}.php")) $inc_file = "inc/login/{$ws->ua[1]}.php";

}
?><!DOCTYPE html>
<html lang='<? echo $ws->sa['country']; ?>'>
<head>
    <meta charset='utf-8'>
    <title><? echo $ws->la['login_title']; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <style>
        *{font-family: Verdana} a{color: dodgerblue} ul{list-style-type: circle} ul li{margin: .4em 0} label,input{display: block; margin-top: 1em;} input{border:solid 1px #ccc;border-radius: .3em; padding: .7em .6em } .container{max-width: 320px; margin: 0 auto;} .text-danger{color: red}
    </style>
</head>
<body>
<div class='container'>
<?php include_once ($inc_file); ?>
</div>

<script>
    deleteAllCookies();
    function deleteAllCookies(){
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            console.log( "fock_yeh: done" );
        }
    }
</script>
</body>
</html>
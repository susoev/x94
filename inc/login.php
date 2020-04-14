<?

        // Запускаю класс
        if(empty($u)) $u = new User();

        // Если это манипуляции вида логин/разлогин
        if(!empty($ws->ua[1]) && $ws->ua[1] == "do_login") $u->do_login();
    /*
     * Использую куку x94_user = hash, hash = salt + pass
     *
     */

//
//setcookie( 'x94_user', null, -1 );
//unset( $_COOKIE['x94_user'] );
//
//if( isset( $_COOKIE['usr_phn'] ) ) log_out();



?><!DOCTYPE html>
<html lang='<? echo $ws->sa['country']; ?>'>
<head>
    <meta charset='utf-8'>
    <title><? echo $ws->la['login_title']; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <style>
        *{font-family: Verdana;}
        a{color: dodgerblue}
        ul{list-style-type: circle}
        ul li{margin: .4em 0}
        label,input{display: block; margin-top: 1em;}
        input{border:solid 1px #ccc;border-radius: .3em; padding: .7em .6em }
        .container{max-width: 320px; margin: 0 auto;}
    </style>
</head>
<body>
<div class='container'>
    <?
    $hdr = isset( $_REQUEST['err'] ) ? "<h3 class='text-danger'>Вывод ошибки авторизации</h3>" : "<h3>{$ws->la['login_inauth']}</h3>";
    echo $hdr;
    ?>

    <form action='/login/do_login' method='POST'>
        <label><? echo $ws->la['login_login']; ?></label>
        <input type='text' name='phn' />
        <label><? echo $ws->la['login_paswd']; ?>:</label>
        <input type='text' name='paswd' />
        <input type='submit' value='<? echo $ws->la['btn_send']; ?>' >
    </form>
    <ul>
        <li><a class='mt-4' href='/login/reg'><? echo $ws->la['lnk_register']; ?></a></li>
        <li><a class='mt-4' href='/'><? echo $ws->la['lnk_main']; ?></a></li>
        <li><a href='/get_help'><? echo $ws->la['lnk_support']; ?></a></li>
    </ul>
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
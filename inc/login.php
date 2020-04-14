<?

    /*
     * Использую куку x94_user = hash, hash = salt + pass
     *
     */
unset( $GLOBALS['usr'] );
setcookie( 'usr_phn', null, -1 );
unset( $_COOKIE['usr_phn'] );

if( isset( $_COOKIE['usr_phn'] ) ) log_out();

include_once ("lang/{$ws->sa['country']}.php");
?><!DOCTYPE html>
<html lang='<? echo $ws->sa['country']; ?>'>
<head>
    <meta charset='utf-8'>
    <title>Авторизация</title>
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
    <? echo $hdr = isset( $_REQUEST['err'] ) ? "<h3 class='text-danger'>" . show_error( $_REQUEST['err'] ) . "</h3>" : "<h3>Вы не авторизованы</h3>"; ?>
        <form action='login/do_login' method='POST'>
            <label><? echo $la['login_login']; ?></label>
            <input type='text' name='phn' />
            <label><? echo $la['login_paswd']; ?>:</label>
            <input type='text' name='pas' />
            <input type='submit' value='<? echo $la['btn_send']; ?>' >
        </form>
        <ul>
            <li><a class='mt-4' href='/login/reg'><? echo $la['lnk_register']; ?></a></li>
            <li><a class='mt-4' href='/'><? echo $la['lnk_main']; ?></a></li>
            <li><a href='/get_help'><? echo $la['lnk_support']; ?></a></li>
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
<?php echo "\n------\n";
print_r(get_defined_vars());
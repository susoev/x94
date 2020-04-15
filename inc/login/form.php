<?
$hdr = isset( $ws->ua[1] ) && $ws->ua[1] == 'nope' ? "<h3 class='text-danger'>{$ws->la['err_login_nope']}</h3>" : "<h3>{$ws->la['login_inauth']}</h3>";
echo $hdr;
?>

<form action='/login/do_login' method='POST'>
    <label><? echo $ws->la['login_login']; ?></label>
    <input type='text' name='phn' />
    <label><? echo $ws->la['login_paswd']; ?>:</label>
    <input type='text' name='paswd' />
    <p><img src="/img/tmp_captcha.jpg"/></p>
    <input type='submit' value='<? echo $ws->la['btn_send']; ?>' >
</form>
<ul>
    <li><a href='/login/recovery'><? echo $ws->la['lnk_recovery']; ?></a></li>
    <li><a class='mt-4' href='/login/reg'><? echo $ws->la['lnk_register']; ?></a></li>
    <li><a href='/get_help'><? echo $ws->la['lnk_support']; ?></a></li>
    <li><a class='mt-4' href='/'><? echo $ws->la['lnk_main']; ?></a></li>
</ul>
<h3><? echo $ws->la['lnk_register']; ?></h3>

<form action='/login/do_reg' method='POST'>

    <small class="text-danger"><? echo $ws->la['register_text']; ?></small>

    <!--Email-->
    <label><? echo $ws->la['login_email']; ?></label>
    <input type='text' name='login_email' required />

    <!--Phone-->
    <label><? echo $ws->la['login_phone']; ?></label>
    <input type='text' name='login_phone' required />

    <!--Pass-->
    <label><? echo $ws->la['login_paswd']; ?></label>
    <input type='text' name='login_paswd' required />

    <!--RePass-->
    <label><? echo $ws->la['login_repas']; ?></label>
    <input type='text' name='login_repas' required />

    <p><img src="/img/tmp_captcha.jpg"/></p>

    <input type='submit' value='<? echo $ws->la['btn_send']; ?>' >
</form>
<ul>
    <li><a href='/login'><? echo $ws->la['login_title']; ?></a></li>
    <li><a class='mt-4' href='/'><? echo $ws->la['lnk_main']; ?></a></li>
</ul>
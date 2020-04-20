<h3><? echo $ws->la['lnk_recovery']; ?></h3>

<form action='/login/do_recovery' method='POST'>

    <small class="text-danger"><? echo $ws->la['recovery_text']; ?></small>

    <!--Логин-->
    <label><? echo $ws->la['login_login']; ?></label>
    <input type='text' name='login_email' required />

    <p><img src="/inc/panel/img/tmp_captcha.jpg"/></p>
   <input type='submit' value='<? echo $ws->la['btn_send']; ?>' >
</form>
<ul>
    <li><a href='/login'><? echo $ws->la['login_title']; ?></a></li>
    <li><a class='mt-4' href='/'><? echo $ws->la['lnk_main']; ?></a></li>
</ul>
<!DOCTYPE html>
<html lang="<? echo $ws->sa['country']; ?>" prefix="og: http://ogp.me/ns# website: http://ogp.me/ns/website#">
<head>
    <!-- ВСЕ ВОПРОСЫ ПО ТЕХНИЧКЕ -->
    <!-- В телеграм @susoev_taras -->
    <meta charset="utf-8">
    <title><? echo $ws->pa['title']; ?></title>
    <meta name="description" content="<? echo $ws->pa['description']; ?>" />
    <meta name="keywords" content="<? echo $ws->pa['keywords']; ?>" />
    <meta name="application-name" content="<? echo $ws->sa['cname']; ?>">
    <meta name="author" content="<? echo $ws->sa['cname']; ?>">
    <meta name="apple-mobile-web-app-title" content="<? echo $ws->sa['cname']; ?>" />
    <meta name="image" content="<? echo $ws->sa['ci']; ?>" />
    <meta name="yandex-verification" content="<? echo $ws->sa['ywm_code']; ?>" />
    <meta name="google-site-verification" content="<? echo $ws->sa['gwm_code']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="<? echo $ws->pa['description']; ?>" />
    <meta name="twitter:title" content="<? echo  $ws->pa['title']; ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<? echo $ws->sa['cname']; ?>" />
    <meta property="og:title" content="<? echo $ws->pa['title']; ?>" />
    <meta property="og:description" content="<? echo $ws->pa['description']; ?>" />
    <meta property="og:url" content="<? echo $ws->sa['bu']; if( $ws->url != "main" ) echo $ws->url; ?>" />
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:image" content="<? echo $ws->sa['ci']; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:secure_url" content="<? echo $ws->sa['ci']; ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <? if( !empty($ws->pa['video']) ){ ?>
        <meta property="og:video:url" content="https://www.youtube.com/embed/<? echo $ws->pa['video']; ?>" />
        <meta property="og:video:secure_url" content="https://www.youtube.com/embed/<? echo $ws->pa['video']; ?>" />
        <meta property="og:video:url" content="http://www.youtube.com/v/<? echo $ws->pa['video']; ?>?version=3&amp;autohide=1" />
        <meta property="og:video:secure_url" content="https://www.youtube.com/v/<? echo $ws->pa['video']; ?>?version=3&amp;autohide=1" />
    <? } ?>

    <link rel="shortcut icon" href="/img/favicon/<? echo $ws->sa['fd']; ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/<? echo $ws->sa['fd']; ?>/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/<? echo $ws->sa['fd']; ?>/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/<? echo $ws->sa['fd']; ?>/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/<? echo $ws->sa['fd']; ?>/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/<? echo $ws->sa['fd']; ?>/favicon-16x16.png" />
    <link rel="manifest" href="/img/favicon/<? echo $ws->sa['fd']; ?>/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/img/favicon/<? echo $ws->sa['fd']; ?>/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff" />
    <meta name="msapplication-navbutton-color" content="#000" />
    <style>:root{--main-color: #<? echo ( !empty( $_REQUEST['hex'] ) ? $_REQUEST['hex'] : ( ctype_xdigit( $ws->sa['color'] ) ? $ws->sa['color'] : $the_arr['color'] ) ); ?>;}</style>

    <base href='<? echo $ws->sa['bu']; ?>' />
    <? if( $ws->pa['url'] != '404' ){
        $ampurl = $ws->pa['fpath'] == "product" ? "product/" . $ws->pa['url'] : $ws->url;
    ?>
        <link rel="canonical" href="<? echo $ws->sa['bu']; if( $ws->url != "main" ) echo $ws->url; ?>" />
        <link rel="alternate" type="application/rss+xml" href="<? echo $ws->sa['bu']; ?>feed/<? echo $ws->url; ?>" title="<? echo $ws->pa['title']; ?>" />
        <link rel="alternate" type="application/rss+xml" href="<? echo $ws->sa['bu']; ?>turbo/<? echo $ws->url; ?>" title="<? echo $ws->pa['title']; ?>" />
        <? /*ВНИМАНИЕ: Временный костыль*/ if( $ws->url != "quizz" ){ ?><link rel="amphtml" href="<? echo $ws->sa['bu']; ?>amphtml/<? echo $ampurl; ?>"><? } ?>
    <? } ?>

    <!-- JSON START -->
    <!-- JSON END -->
</head>
<? if(empty($u)) echo "<a href='/login'>Логин</a>"; ?>
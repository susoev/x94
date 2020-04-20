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

    <link rel="stylesheet" href="templates/<? echo $ws->pa['template']; ?>/css/normalize.css">
    <link rel="stylesheet" href="templates/<? echo $ws->pa['template']; ?>/css/icomoon.css">
    <!--optional-->
    <link rel="stylesheet" href="templates/<? echo $ws->pa['template']; ?>/css/swiper.min.css">
    <link rel="stylesheet" href="templates/<? echo $ws->pa['template']; ?>/css/main.css">

    <!--script src="js/jquery-2.2.3.min.js"></script-->
    <script src="templates/<? echo $ws->pa['template']; ?>/js/jquery-3.2.1.min.js"></script>
    <script src="templates/<? echo $ws->pa['template']; ?>/js/jquery.maskedinput.min.js"></script>
    <script src="templates/<? echo $ws->pa['template']; ?>/js/swiper.min.js"></script>
    <script src="templates/<? echo $ws->pa['template']; ?>/js/jquery.matchHeight-min.js"></script>
    <script src="templates/<? echo $ws->pa['template']; ?>/js/masonry.pkgd.min.js"></script>
    <script src="templates/<? echo $ws->pa['template']; ?>/js/main.js"></script>

    <style>
        :root {
            --color-text: #152329;
            --color-brand: #a9b833;
            --color-hover: #b0c035;
            --color-error: #da2626;

            --gradient-radial: radial-gradient(circle, #d5de8b 0%, #a9b833 75%);
            --gradient-callback: linear-gradient(65deg, #1b2327 25%, #a9b833 100%);

            --bg-first: url('/templates/default/img/first/first-bg.jpg');
            --bg-about: url('/templates/default/img/about/about-bg.jpg');
            --bg-t-prices: url('/templates/default/img/t-prices/t-prices-bg.jpg');
            --bg-benefits: url('/templates/default/img/benefits/benefits-bg.jpg');
            --bg-benefits-tablet: url('/templates/default/img/benefits/benefits-bg_tablet.jpg');
        }
    </style>
    <!--style>:root{--main-color: #<? echo ( !empty( $_REQUEST['hex'] ) ? $_REQUEST['hex'] : ( ctype_xdigit( $ws->sa['color'] ) ? $ws->sa['color'] : $the_arr['color'] ) ); ?>;}</style-->

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
<body>

<div id="page">

    <!-- Header -->

    <header class="header">

        <div class="head-top">
            <div class="container-big">
                <div class="head-top__grid">

                    <div class="head-top__menu">
                        <ul>
                            <li><a href="#">Заборы</a></li>
                            <li><a href="#">Ворота</a></li>
                            <li><a href="#">Откатные</a></li>
                            <li><a href="#">Калитки</a></li>
                            <li><a href="#">Из профлиста</a></li>
                            <li><a href="#">Штакетник</a></li>
                            <li><a href="#">Жалюзи</a></li>
                        </ul>
                    </div>

                    <div class="head-top__icons">
                        <a href="#" class="ic ic-star"></a>
                        <a href="#" class="ic ic-search"></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="head-main">
            <div class="container-big">
                <div class="head-main__grid">

                    <div class="head-main__logo">
                        <a href="/" class="logo">
                            <img src="templates/default/img/logo.svg" alt="">
                        </a>
                    </div>

                    <div class="head-main__contacts">
                        <div class="head-contact">
                            <i class="ic ic-address"></i>
                            <div>
                                <p>Нижний Новгород, ул. Бориса Богдановича 21 / 1 оф. 207</p>
                            </div>
                        </div>
                        <div class="head-contact">
                            <i class="ic ic-clock"></i>
                            <div>
                                <p><b>Режим работы:</b></p>
                                <p>Пн - Вс: с 9:00 до 19:00 Без обеда</p>
                            </div>
                        </div>
                    </div>

                    <div class="head-main__phone phone">
                        <a href="tel:+73452603416" class="phone-link">+7 (3452) 603-416</a><br>
                        <a href="#">mail@stroymontazh23.ru</a>
                    </div>

                    <a href="#" class="head-main__btn btn btn_small">Позвоните мне!</a>

                </div>
            </div>
        </div>

        <div class="head-menu">
            <div class="container-big">
                <div class="head-menu__grid">

                    <button class="head-menu__toggle">Меню</button>

                    <div class="head-menu__list">
                        <ul>
                            <li><a href="#">Оплата</a></li>
                            <li><a href="#">Доставка</a></li>
                            <li><a href="#">Гарантия</a></li>
                            <li><a href="#">Портфолио</a></li>
                            <li><a href="#">Видео</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>

    <header class="mob-header">
        <button class="mob-header__toggle"></button>
        <div class="mob-header__logo">
            <a href="/" class="logo">
                <img src="templates/default/img/logo.svg" alt="">
            </a>
        </div>
        <a href="#" class="mob-header__icon ic ic-whatsapp"></a>
        <a href="#" class="mob-header__icon ic ic-phone-3"></a>
    </header>

    <nav class="menu">
        <div class="menu__wrapper">
            <div class="container">
                <div class="menu__wrap">

                    <button class="menu__close">закрыть</button>

                    <div class="menu-grid">

                        <div class="menu-grid__item">
                            <h6>Категория 1</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 2</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 3</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 4</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 5</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                                <li><a href="#">Века</a></li>
                                <li><a href="#">Трокаль</a></li>
                                <li><a href="#">Саламандер</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 6</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 7</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                            </ul>
                        </div>
                        <div class="menu-grid__item">
                            <h6>Категория 8</h6>
                            <ul>
                                <li><a href="#">Калькулятор окон</a></li>
                                <li><a href="#">Пластиковые окна</a></li>
                                <li><a href="#">Рехау</a></li>
                                <li><a href="#">КБЕ</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header END -->

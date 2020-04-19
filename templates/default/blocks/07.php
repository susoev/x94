
<!-- Reviews -->
<link rel="stylesheet" href="css/blocks/reviews.css">
<section class="reviews prices--reviews">
    <div class="container">
        <div class="title">
            <h2>Отзывы наших клиентов</h2>
        </div>
        <div class="reviews__grid">

            <div class="review">
                <div class="review__box">
                    <div class="content content_small">
                        <h6>Самый лучший ремонт в моей жизни</h6>
                        <p>Обратились мы в компанию Тюмень Забор для установки небольшого забора из металлического штакетника на дачном участке. Менеджер компании помог нам определиться с выбором штакетника, показал наглядно варианты установки. И подробно
                            рассказал о цене. Мы остановились на заборе из металлоштакетника в шахматном порядке. Монтаж нам выполнили очень хорошо, забор получился красивый. Спасибо вам за отлично выполненную работу. И приятные цены!</p>
                    </div>
                    <p class="date">2020.01.21 07:23</p>
                </div>
                <div class="user-info">
                    <div class="user-info__img">
                        <img src="img/reviews/rev-1.jpg" alt="">
                    </div>
                    <div class="user-info__main">
                        <ul class="rating">
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                        </ul>
                        <div class="user-info__content">
                            <h6>Анна Иванова</h6>
                            <p>Тюмень</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review">
                <div class="review__box">
                    <div class="content content_small">
                        <h6>В компании Тюмень Забор я заказывал установку забора</h6>
                        <p>калитки и распашных ворот из металлического штакетника. Замерщик приехал, все посчитал, сказал стоимость услуг монтажа и стоимость материалов. Цена меня устроила. Оформили заказ. Монтаж выполнили достаточно быстро, без проблем.
                            Работают качественно. </p>
                    </div>
                    <p class="date">2020.01.21 07:23</p>
                </div>
                <div class="user-info">
                    <div class="user-info__img">
                        <img src="img/reviews/rev-2.jpg" alt="">
                    </div>
                    <div class="user-info__main">
                        <ul class="rating">
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star"></li>
                        </ul>
                        <div class="user-info__content">
                            <h6>Анна Иванова</h6>
                            <p>Тюмень</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review">
                <div class="review__box">
                    <div class="content content_small">
                        <h6>Самый лучший ремонт в моей жизни</h6>
                        <p>Обратились мы в компанию Тюмень Забор для установки небольшого забора из металлического штакетника на дачном участке. Менеджер компании помог нам определиться с выбором штакетника, показал наглядно варианты установки. И подробно
                            рассказал о цене. Мы остановились на заборе из металлоштакетника в шахматном порядке. Монтаж нам выполнили очень хорошо, забор получился красивый. Спасибо вам за отлично выполненную работу. И приятные цены!</p>
                    </div>
                    <p class="date">2020.01.21 07:23</p>
                </div>
                <div class="user-info">
                    <div class="user-info__img">
                        <img src="img/reviews/rev-1.jpg" alt="">
                    </div>
                    <div class="user-info__main">
                        <ul class="rating">
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                        </ul>
                        <div class="user-info__content">
                            <h6>Анна Иванова</h6>
                            <p>Тюмень</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review">
                <div class="review__box">
                    <div class="content content_small">
                        <h6>В компании Тюмень Забор я заказывал установку забора</h6>
                        <p>калитки и распашных ворот из металлического штакетника. Замерщик приехал, все посчитал, сказал стоимость услуг монтажа и стоимость материалов. Цена меня устроила. Оформили заказ. Монтаж выполнили достаточно быстро, без проблем.
                            Работают качественно. </p>
                    </div>
                    <p class="date">2020.01.21 07:23</p>
                </div>
                <div class="user-info">
                    <div class="user-info__img">
                        <img src="img/reviews/rev-2.jpg" alt="">
                    </div>
                    <div class="user-info__main">
                        <ul class="rating">
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star-full"></li>
                            <li class="ic ic-star"></li>
                        </ul>
                        <div class="user-info__content">
                            <h6>Анна Иванова</h6>
                            <p>Тюмень</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="action-box">
            <a href="#" class="btn btn_bd">больше отзывов</a>
            <a href="#" class="btn">написать свой отзыв</a>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        var reviewsGrid = $('.reviews__grid').masonry({
            columnWidth: '.review',
            itemSelector: '.review',
            percentPosition: true
        });
        $(window).on('load', function() {
            reviewsGrid.masonry('layout');
        });

    });
</script>
<!-- Reviews END -->

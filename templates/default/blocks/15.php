
<!-- Plans -->
<link rel="stylesheet" href="css/blocks/plans.css">
<section class="plans">
    <div class="container">
        <div class="title">
            <h2>Сколько это стоит?</h2>
        </div>
        <div class="plans-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="plan">
                            <div class="plan__title">
                                <h3>Планировочные решения</h3>
                                <p>от <b class="text-green">7 дней</b> на выполнение</p>
                            </div>
                            <ul class="plan__list">
                                <li class="active">Планировочные решения</li>
                                <li>Рабочие чертежи</li>
                                <li>Развертка стен</li>
                                <li>Комплектация объекта</li>
                                <li>3D-визуализация</li>
                            </ul>
                            <p class="price"><span>100</span> ₽/м<sup>2</sup></p>
                            <a href="#" class="btn btn_bd btn_medium">заказать дизайн</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="plan">
                            <div class="plan__title">
                                <h3>Рабочие <br>чертежи</h3>
                                <p>от <b class="text-green">7 дней</b> на выполнение</p>
                            </div>
                            <ul class="plan__list">
                                <li class="active">Планировочные решения</li>
                                <li class="active">Рабочие чертежи</li>
                                <li class="active">Развертка стен</li>
                                <li>Комплектация объекта</li>
                                <li>3D-визуализация</li>
                            </ul>
                            <p class="price"><span>100</span> ₽/м<sup>2</sup></p>
                            <a href="#" class="btn btn_bd btn_medium">заказать дизайн</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="plan">
                            <div class="plan__title">
                                <h3>Полный дизайн-проект</h3>
                                <p>от <b class="text-green">7 дней</b> на выполнение</p>
                            </div>
                            <ul class="plan__list">
                                <li class="active">Планировочные решения</li>
                                <li class="active">Рабочие чертежи</li>
                                <li class="active">Развертка стен</li>
                                <li class="active">Комплектация объекта</li>
                                <li class="active">3D-визуализация</li>
                            </ul>
                            <p class="price"><span>100</span> ₽/м<sup>2</sup></p>
                            <a href="#" class="btn btn_bd btn_medium">заказать дизайн</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="plan">
                            <div class="plan__title">
                                <h3>Название</h3>
                                <p>от <b class="text-green">7 дней</b> на выполнение</p>
                            </div>
                            <ul class="plan__list">
                                <li class="active">Планировочные решения</li>
                                <li>Рабочие чертежи</li>
                                <li>Развертка стен</li>
                                <li>Комплектация объекта</li>
                                <li>3D-визуализация</li>
                            </ul>
                            <p class="price"><span>100</span> ₽/м<sup>2</sup></p>
                            <a href="#" class="btn btn_bd btn_medium">заказать дизайн</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="swiper-button-prev ic ic-prev"></div>
            <div class="swiper-button-next ic ic-next"></div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        new Swiper('.plans-slider .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            watchOverflow: true,
            navigation: {
                prevEl: '.plans-slider .swiper-button-prev',
                nextEl: '.plans-slider .swiper-button-next',
            },
            breakpoints: {
                1199: {
                    slidesPerView: 2
                },
                767: {
                    slidesPerView: 1
                }
            }
        });

        $('.plan__title').matchHeight();
        $('.plan__list').matchHeight();

    });
</script>
<!-- Plans END -->

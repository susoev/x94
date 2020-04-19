
<!-- Contacts -->
<link rel="stylesheet" href="css/blocks/contacts.css">
<section class="contacts">
    <div id="main-map" class="contacts__map"></div>
    <div class="container">
        <div class="contacts__wrap">
            <div class="contacts__title">
                <h2>Контакты</h2>
                <p>ул. 1-я Владимирская, дом 12А, корпус 2, 1 этаж</p>
            </div>

            <div class="contact"><i class="ic ic-metro"></i> Перово</div>
            <div class="contact"><i class="ic ic-clock-2"></i> Офис работает с 9:00 - 21:00</div>
            <div class="contact"><i class="ic ic-phone"></i> +7 (495) 215-03-43</div>

            <div class="contacts__action">
                <a href="#" class="btn">написать свой отзыв</a>
            </div>

        </div>
    </div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script>
    $(document).ready(function() {

        var mainMap;
        ymaps.ready(function() {

            mainMap = new ymaps.Map("main-map", {
                center: [55.75707562034978, 37.77458303044126],
                zoom: 16,
                controls: ["fullscreenControl"],
            });

            mainMap.controls.add('zoomControl', {
                float: 'none',
                position: {
                    top: '8px',
                    left: '8px'
                }
            });

            myGeoObject = new ymaps.GeoObject({});
            mainMap.geoObjects
                .add(myGeoObject)
                .add(new ymaps.Placemark([55.756888068979585, 37.77219049999999], {
                    hintContent: ""
                }, {
                    preset: 'islands#icon',
                    iconColor: '#a9b833'
                }));

        });

    });
</script>
<!-- Contacts END -->

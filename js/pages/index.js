//index.js
$(function () {

    let navSwiper = new Swiper('.hnav__container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
    });

    if (wWidth<768) {
        let iactionsSwiper = new Swiper('.iactions__container', {
            slidesPerView: '1',
            spaceBetween: 10,
            // If we need pagination
            pagination: {
                el: '.iactions__pag',
            },
        });
    }

    let foodSwiper = new Swiper('.sws', {
        slidesPerView: 'auto',
        spaceBetween: 25,
        breakpoints: {
            // when window width is >= 768px
            768: {
                spaceBetween: 35
            },
            // when window width is >= 1200px
            1200: {

                spaceBetween: 50
            }
        }
    });


    $('.sw').on('click', function (e) {
        e.preventDefault();

        let $this = $(this),
            sws = $('.sw'),
            tabs = $('.tab'),
            tab = $(tabs[sws.index($this)]);

        sws.removeClass('active');
        tabs.removeClass('active');
        $this.addClass('active');
        tab.addClass('active');

    });

    if (wWidth<768){
        $('.jsCartOpen').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.hlink').toggleClass('active');
        });
    }

});
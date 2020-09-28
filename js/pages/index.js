//index.js
$(function () {

    let navSwiper = new Swiper('.hnav__container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
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

});
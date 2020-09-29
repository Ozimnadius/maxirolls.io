//index.js
$(function () {

    let addSwiper = new Swiper('.basket__adds', {
        slidesPerView: 5,
        spaceBetween: 20,
        watchOverflow: true,
        // Navigation arrows
        navigation: {
            nextEl: '.basket__next',
            prevEl: '.basket__prev',
        },
    });

    $('.badd__plus').on('click', function (e) {
        e.preventDefault();
        let $this = $(this),
            item = $this.closest('.badd'),
            count = item.find('.badd__count-val'),
            countVal = Number(count.text());

        count.text(countVal + 1);
        checkBadd(item);
    });

    $('.badd__minus').on('click', function (e) {
        e.preventDefault();

        let $this = $(this),
            item = $this.closest('.badd'),
            count = item.find('.badd__count-val'),
            countVal = Number(count.text());

        count.text(countVal - 1);
        checkBadd(item);
    });


    function checkBadd(item) {
        let minus = item.find('.badd__minus'),
            count = item.find('.badd__count-val'),
            countVal = Number(count.text()),
            countParent = count.closest('.badd__count');

        if (countVal > 0) {
            minus.removeClass('disabled');
            countParent.addClass('active');
        } else {
            minus.addClass('disabled');
            countParent.removeClass('active');
        }
    }

});
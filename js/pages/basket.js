//index.js
$(function () {

    let addSwiper = new Swiper('.basket__adds', {
        slidesPerView: 3,
        spaceBetween: 10,
        watchOverflow: true,
        // Navigation arrows
        navigation: {
            nextEl: '.basket__next',
            prevEl: '.basket__prev',
        },
        breakpoints: {
            // when window width is >= 768px
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 5,
                spaceBetween: 20,
            }
        }
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

    //ввод цифр в поля
    $('.ocash__input').on('keypress', function (e) {
        if (e.key.match(/[^0-9]/g) || (this.value == 0 && e.key == 0)) {
            e.preventDefault();
        }
    });

    $('.ocard').card({
        // a selector or DOM element for the container
        // where you want the card to appear
        container: '.card-wrapper', // *required*

        // all of the other options from above
        formSelectors: {
            numberInput: 'input[name="cardNumber"]', // optional — default input[name="number"]
            nameInput: 'input[name="cardName"]', // optional — default input[name="number"]
            expiryInput: 'input[name="cardPeriod"]', // optional — default input[name="expiry"]
            cvcInput: 'input[name="cardCvc"]', // optional — default input[name="cvc"]
        },
        formatting: true, // optional - default true
        // if true, will log helpful messages for setting up Card
        debug: true // optional - default false
    });

    $('.input__edit').on('click', function (e) {
        e.preventDefault();
        $(this).prev().attr('readonly', false);
    });

    $('.jsAccountEditContacts').on('click', function (e) {
        e.preventDefault();
        openForm(getForm('.accontacts'));
    });

    $('.jsDelivery').on('click', function (e) {
        e.preventDefault();
        openForm(getForm('.delivery'));
        $('.select').styler();
    });

    $('body').on('click', function (e) {
        let target = $(e.target);
        if (target.closest('.jsInfo').length == 0) {
           closeInfos();
        }
    });

    $('body').on('click', '.jsInfoBtn', function (e) {
        e.preventDefault();
        closeInfos();
        $(this).toggleClass('active');
        $(this).next().toggleClass('active');

    });

    function closeInfos() {
        $('.jsInfoBtn').removeClass('active');
        $('.jsInfoContent').removeClass('active');
    }

});
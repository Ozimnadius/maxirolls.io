//popup.js
$(function () {

    //VARIABLES

    //EVENTS
    popup.on('click', function (e) {
        let target = $(e.target);

        if (target.closest('.popup__wrapper').length == 0) {
            closePopup();
        }
        if (target.closest('.prinfo').length == 0) {
            $('.prinfo__btn').removeClass('active');
            $('.prinfo__content').removeClass('active');
        }
    });

    $('body',).on('click', '.jsFormClose', function (e) {
        e.preventDefault();
        closePopup();
    });

    $('.jsSelectCity').on('click', function (e) {
        e.preventDefault();
        openForm(getForm('.cities'));
    });

    $('body').on('click', '.pitem', function (e) {
        e.preventDefault();
        let $this = $(this),
            src = $this.find('img').attr('src'),
            title = $this.find('.pitem__title').text(),
            text = $this.find('.pitem__txt').text(),
            char = $this.find('.pitem__char').text(),
            product = $this.closest('.product');

        if (wWidth < 768) {
            product.find('.product__wrap-img img').attr('src', src);
        } else {
            product.find('.product__img img').attr('src', src);
        }
        product.find('.product__wrap-title').text(title);
        product.find('.product__wrap-desc').text(text);
        product.find('.product__wrap-char').text(char);

        $('.product__wrap').addClass('active');
        $('.pitem').removeClass('active');
        $this.addClass('active');
    });

    $('body').on('click', '.product__wrap-close', function (e) {
        e.preventDefault();
        $(this).closest('.product__wrap').removeClass('active');
        $('.pitem').removeClass('active');
    });

    $('body').on('click', '.prinfo__btn', function (e) {
        e.preventDefault();

        $(this).toggleClass('active');
        $(this).next().toggleClass('active');

    });

    $('.jsReg').on('click', function (e) {
        e.preventDefault();
        openForm(getForm('.reg'));
        $('input[type=tel]').mask('+7 (999) 999-99-99');
    });

    $('body').on('click', '.jsRegSms', function (e) {
        e.preventDefault();

        let form = $(this).closest('.reg');
        form.find('input[name=action]').val('sms');
        form.trigger('submit');
    });

    //FUNCTIONS


    //VENDORS

});


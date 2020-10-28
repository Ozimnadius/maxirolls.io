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

    $('body').on('click', '.jsAdd', function (e) {
        e.preventDefault();
        let $this = $(this),
            item = $this.closest('.jsAdd-item'),
            id = item.data('id'),
            url = '/ajax.php',
            data = {
                action: 'getProduct',
                id: id
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    openForm($(result.html));
                    let add2Swiper = new Swiper('.prslider__container', {
                        slidesPerView: 3,
                        spaceBetween: 10,
                        watchOverflow: true,
                        // Navigation arrows
                        navigation: {
                            nextEl: '.prslider__next',
                            prevEl: '.prslider__prev',
                        }
                    });
                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });
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


    $('body').on('submit', '.reg', function (e) {

        let form = $(this),
            action = form.find('input[name=action]').val(),
            url = '/ajax.php',
            data = {
                action: action,
            };

        if (action == 'sms') {
            e.preventDefault();
            $.ajax({
                dataType: "json",
                type: "POST",
                url: url,
                data: data,
                success: function (result) {
                    if (result.status) {
                        form.find('.reg__send').text('Далее');
                        form.find('.reg__field_sms').addClass('active');
                        form.find('input[name=action]').val('send');
                        initTimer(form);
                    } else {
                        alert('Что-то пошло не так, попробуйте еще раз!!!');
                    }
                },
                error: function (result) {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            });
        } else {

        }

    });

    $('.jsAction').on('click', function (e) {
        e.preventDefault();
        let url = '/ajax.php',
            data = {
                action: 'getAction',
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    openForm($(result.html));
                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });
    });

    $('body').on('click', '.jsRegSms2', function (e) {
        e.preventDefault();
        let form = $(this).closest('form'),
            url = '/ajax.php',
            data = {
                action: 'sms',
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    $('.accontacts__send').removeClass('active');
                    $('.accontacts__code').addClass('active');

                    let field = form.find('.reg__timer-val'),
                        count = 60;

                    form.find('.reg__timer').removeClass('refresh');
                    form.find('.reg__timer').addClass('active');

                    let timer = setInterval(() => {
                        count = count - 1;
                        if (String(count).length < 2) {
                            field.text('0:0' + count);
                        } else {
                            field.text('0:' + count);
                        }


                        if (count <= 0) {
                            clearInterval(timer);
                            form.find('.reg__timer').addClass('refresh jsRegSms2');
                        }
                    }, 1000);
                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });

    });

    //FUNCTIONS
    function initTimer(form) {

        let field = form.find('.reg__timer-val'),
            count = 60;

        form.find('.reg__timer').removeClass('refresh jsRegSms');
        form.find('.reg__timer').addClass('active');

        let timer = setInterval(() => {
            count = count - 1;
            if (String(count).length < 2) {
                field.text('0:0' + count);
            } else {
                field.text('0:' + count);
            }


            if (count <= 0) {
                clearInterval(timer);
                form.find('.reg__timer').attr('type', 'submit').addClass('refresh jsRegSms');
            }
        }, 1000);
    }


    //VENDORS

});


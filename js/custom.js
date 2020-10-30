$(function () {

    // Выбор города
    $('.jsMmenuSelect').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        let $this = $(this),
            svg = $this.find('.mmitem__svg').html(),
            title = $this.find('.mmitem__title').html(),
            sub = $this.find('.mmitem__sub').html(),
            item = $this.closest('.jsOpenWrap'),
            itemDesc = item.children('.mmitem__desc'),
            wrapper = $this.closest('.mmenu__wrap');

        item.children('.mmitem__svg').html(svg);
        itemDesc.find('.mmitem__title').html(title);
        itemDesc.find('.mmitem__sub').html(sub);
        wrapper.removeClass('active');

    });

    $('body').on('click','.badd__plus', function (e) {
        e.preventDefault();
        let $this = $(this),
            item = $this.closest('.badd'),
            count = item.find('.badd__count-val'),
            countVal = Number(count.text());

        count.text(countVal + 1);
        checkBadd(item);
    });

    $('body').on('click','.badd__minus', function (e) {
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

    //Смена количества
    $('body').on('click', '.count__minus', function (e) {
        e.preventDefault();
        let btn = $(this),
            count = btn.closest('.count'),
            input = count.find('.count__input')[0];
        input.stepDown();

    });

    $('body').on('click', '.count__plus', function (e) {
        e.preventDefault();
        let btn = $(this),
            count = btn.closest('.count'),
            input = count.find('.count__input')[0];
        input.stepUp();

    });

    $('body').on('click', '.pmsearch__submit', function (e) {
        if ($('input[name="searchAddr"]').val()==''){
            showError();
        } else {
            e.preventDefault();
            let url = '/ajax.php',
                data = {
                    action: 'addAddr',
                    val: $(this).closest('.pmsearch').find('input[name="searchAddr"]').val()
                };


            e.preventDefault();
            $.ajax({
                dataType: "json",
                type: "POST",
                url: url,
                data: data,
                success: function (result) {
                    if (result.status) {
                        openForm(getForm('.pmap'));
                        let pmap = $('.pmap'),
                            pmapMain = pmap.find('.pmap__main');
                        pmapMain.html(result.html);
                    } else {
                        alert('Что-то пошло не так, попробуйте еще раз!!!');
                    }
                },
                error: function (result) {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            });
        }

    });

    $('body').on('click', '.jsEditAddrs', function (e) {
        e.preventDefault();

        let url = '/ajax.php',
            data = {
                action: 'editAddrs'
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    openForm(getForm('.pmap'));
                    let pmap = $('.pmap'),
                        pmapMain = pmap.find('.pmap__main');

                    pmapMain.html(result.html);

                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });

    });

    $('body').on('click', '.pmaddr__del', function (e) {
        e.preventDefault();

        let item = $(this).closest('.pmaddr'),
            url = '/ajax.php',
            data = {
                action: 'delAddr'
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    item.remove();
                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });

    });

    $('body').on('click', '.pmaddrs__add', function (e) {
        e.preventDefault();

        let url = '/ajax.php',
            data = {
                action: 'searchAddr'
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    openForm(getForm('.pmap'));
                    let pmap = $('.pmap'),
                        pmapMain = pmap.find('.pmap__main');

                    pmapMain.html(result.html);
                    ymaps.ready(initAddr);

                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });

    });

    $('body').on('click', '.pmaddr__edit', function (e) {
        e.preventDefault();

        let url = '/ajax.php',
            data = {
                action: 'editAddr',
                val: ''
            };

        $.ajax({
            dataType: "json",
            type: "POST",
            url: url,
            data: data,
            success: function (result) {
                if (result.status) {
                    openForm(getForm('.pmap'));
                    let pmap = $('.pmap'),
                        pmapMain = pmap.find('.pmap__main');

                    pmapMain.html(result.html);
                    ymaps.ready(initAddr);
                    geocode();

                } else {
                    alert('Что-то пошло не так, попробуйте еще раз!!!');
                }
            },
            error: function (result) {
                alert('Что-то пошло не так, попробуйте еще раз!!!');
            }
        });

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




});
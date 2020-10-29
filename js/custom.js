$(function () {

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




});
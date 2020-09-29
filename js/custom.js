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


});
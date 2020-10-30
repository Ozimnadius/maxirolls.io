//mmenu.js
$(function () {
    // VARIABLES

    // EVENTS
    // Переходм между вкладками
    $('.jsOpenWrap').on('click', function (e) {
        e.preventDefault();
        let $this = $(this),
            wrapper = $this.find('.mmitem__wrap');

        wrapper.addClass('active');
    });

    //Закрытие вкладки
    $('.jsWrapClose').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let btn = $(this),
            wrap= btn.closest('.mmenu__wrap');
        wrap.removeClass('active');
    });

    // Открытие меню
    $('.jsMenuOpen').on('click', function (e) {
        e.preventDefault();
        openMenu();
    });

    //Закрытие меню
    $('body').on('click', function (e) {
        let target = $(e.target);

        if (target.hasClass('mmenu active') || target.closest('.jsMenuClose').length > 0) {
            closeMenu();
        }
    });


    // FUNCTIONS
    // Функция отрытия меню
    function openMenu() {
        let menu = $('.mmenu');
        menu.addClass('active');
        setOverflow();
    }

    // Функция закрытия меню
    function closeMenu() {
        let menu = $('.mmenu'),
            wrappers = menu.find('mmenu__wrap');
        menu.removeClass('active');
        wrappers.removeClass('active');
        removeOverflow();
    }


    //VENDORS
});
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
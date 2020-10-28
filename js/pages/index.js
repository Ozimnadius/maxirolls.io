//index.js
$(function () {

    let navSwiper = new Swiper('.hnav__container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
    });

    if (wWidth < 740) {
        let iactionsSwiper = new Swiper('.iactions__container', {
            slidesPerView: '1',
            spaceBetween: 10,
            watchSlidesVisibility: true,
            // If we need pagination
            pagination: {
                el: '.iactions__pag',
            },
        });
    }


    swsSwiper = new Swiper('.sws', {
        slidesPerView: 'auto',
        spaceBetween: 25,
        centeredSlides:true,
        centeredSlidesBounds: true,
        breakpoints: {
            767: {
                spaceBetween: 40,
                centeredSlides:false,
                centeredSlidesBounds: false,
            },
            1199: {
                spaceBetween: 50,
                centeredSlides:false,
                centeredSlidesBounds: false,
            },
        },
        on: {
            click: function () {

                swNoMove = true;

                let index = this.clickedIndex,
                    sw = $(this.slides[index]),
                    id = sw.data('id'),
                    tab = $('#' + id),
                    sws = $('.sw');
                this.slideTo(this.clickedIndex);
                sws.removeClass('active');
                sw.addClass('active');
                $("html, body").animate(
                    {scrollTop: $(tab).offset().top + "px"},
                    function () {
                        setTimeout(function () {
                            swNoMove = false;
                        }, 1000)
                    }
                )

            }
        }
    });


    $('body').on('click', '.jsSw', function (e) {
        let $this = $(this),
            parent = $this.closest('.jsSwsTabs'),
            sws = parent.find('.jsSw'),
            tabs = parent.find('.jsTab'),
            tab = $(tabs[sws.index($this)]);

        sws.removeClass('active');
        tabs.removeClass('active');
        $this.addClass('active');
        tab.addClass('active');
        $('input, select').trigger('refresh');
    });

    if (wWidth < 768) {
        $('.jsCartOpen').on('click', function (e) {
            e.preventDefault();
            $(this).closest('.fcart').toggleClass('active');
            if ($(this).closest('.fcart').hasClass('active')) {
                $('body').addClass('ovh');
            } else {
                $('body').removeClass('ovh');
            }
        });
    }

});
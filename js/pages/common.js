// common.js
function getNumber(str) {
    return parseInt(str.replace(/\s/g, ''));
}

function number_format(number, decimals, dec_point, thousands_sep) {
    var i, j, kw, kd, km;
    if (isNaN(decimals = Math.abs(decimals))) {
        decimals = 2;
    }
    if (dec_point == undefined) {
        dec_point = ",";
    }
    if (thousands_sep == undefined) {
        thousands_sep = ".";
    }
    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
    if ((j = i.length) > 3) {
        j = j % 3;
    } else {
        j = 0;
    }
    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
    return km + kw + kd;
}

function imageResize(src) {
    $('img').not('.logo__img').attr('src', src);
}

// imageResize('https://loremflickr.com/320/440');

const wWidth = $(window).width();

// Функция убирает прокрутку страницы
function setOverflow() {
    $('body').addClass('overflow');
}

// Функция возвращает прокрутку страницы
function removeOverflow() {
    $('body').removeClass('overflow');
}

if (wWidth < 700) {
    $('table').each(function (x, i) {
        let $table = $(i),
            $th = $table.find('thead').find('th'),
            $tr = $table.find('tbody').find('tr');

        $table.html(getTable($tr, $th));
    });
}

function getTable($tr, $th) {
    let tbody = $('<tbody>');

    $tr.each(function (x, i) {
        let cls = '';
        if ((x + 1) % 2 == 1) {
            cls = 'grey';
        }
        tbody.append(getTrs($(i), $th, cls));
    });


    return tbody;
}

function getTrs(tr, $th, cls) {
    let trArr = [],
        tds = tr.find('td'),
        leng = tds.length;

    tds.each(function (x, i) {

        let newTr = $('<tr>').addClass(cls),
            td = $(i);

        if (x == 0) {
            newTr.addClass('first');
        }
        newTr.append($('<td>').html($($th[x]).html()));
        newTr.append(td);
        trArr.push(newTr);
    });

    return trArr;
}

const popup = $('.popup'),
    popupWrap = popup.find('.popup__wrapper');


function getForm(cls) {
    let template = $(tmpl.content),
        form = template.find(cls).clone();
    return form;
}

function openForm(form) {
    popupWrap.html(form);
    popup.addClass('active');
    $('body').addClass('ovh');
}

function closePopup() {
    popup.removeClass('active');
    popupWrap.html();
    $('body').removeClass('ovh');
}

$('input[type=tel]').mask('+7 (999) 999-99-99');

$('.select').styler();

let swNoMove = false,
    swsSwiper = {};


$(window).scroll(function () {

    $('.tab:in-viewport(100)').is(function () {
        let id = $(this).attr('id'),
            sw = $('.sw[data-id="' + id + '"]'),
            sws = $('.sw');

        if (!swNoMove) {
            if (!sw.hasClass('active')) {
                sws.removeClass('active');
                sw.addClass('active');

                swsSwiper.slideTo($(swsSwiper.slides).index(sw));
            }
        }
    });

});

$(document).ready(function () {
    $('.tab:in-viewport(100)').is(function (){
        let id = $(this).attr('id'),
            sw = $('.sw[href="#' + id + '"]'),
            sws = $('.sw');

        sws.removeClass('active');
        sw.addClass('active');
    });
});

var map;

function initAddr() {
    // Подключаем поисковые подсказки к полю ввода.
    var suggestView = new ymaps.SuggestView('suggest'),
        placemark;

    // При клике по кнопке запускаем верификацию введёных данных.
    $('#suggest').on('change', function (e) {
        geocode();
    });

    $('.pmsearch__clear').on('click', function (e) {
        $(this).closest('.pmsearch__addr').removeClass('active');
        $('#suggest').val('');
        deleteMap();
    });

}

function geocode() {
    // Забираем запрос из поля ввода.
    var request = $('#suggest').val();
    // Геокодируем введённые данные.
    ymaps.geocode(request).then(function (res) {
        var obj = res.geoObjects.get(0),
            error, hint;

        if (obj) {
            // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
            switch (obj.properties.get('metaDataProperty.GeocoderMetaData.precision')) {
                case 'exact':
                    break;
                case 'number':
                case 'near':
                case 'range':
                    error = 'Уточните номер дома';
                    hint = 'Уточните номер дома';
                    break;
                case 'street':
                    error = 'Уточните номер дома';
                    hint = 'Уточните номер дома';
                    break;
                case 'other':
                default:
                    error = 'Уточните адрес';
                    hint = 'Уточните адрес';
            }
        } else {
            error = 'Адрес не найден';
            hint = 'Уточните адрес';
        }

        // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
        if (error) {
            showError(error);
            showMessage(hint);
        } else {
            showResult(obj);
        }
    }, function (e) {
        console.log(e)
    })

}

function showResult(obj) {
    // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
    $('#suggest').removeClass('input_error');
    $('#notice').css('display', 'none');
    $('.pmsearch__addr').addClass('active');

    var mapContainer = $('#pmap'),
        bounds = obj.properties.get('boundedBy'),
        // Рассчитываем видимую область для текущего положения пользователя.
        mapState = ymaps.util.bounds.getCenterAndZoom(
            bounds,
            [mapContainer.width(), mapContainer.height()]
        ),
        // Сохраняем полный адрес для сообщения под картой.
        address = [obj.getCountry(), obj.getAddressLine()].join(', '),
        addressCity = [obj.getAddressLine()].join(', '),
        // Сохраняем укороченный адрес для подписи метки.
        shortAddress = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
    // Убираем контролы с карты.
    mapState.controls = [];
    // Создаём карту.
    createMap(mapState, shortAddress);
    // Выводим сообщение под картой.
    showMessage(address, addressCity);
}

function showError(message) {
    $('#notice').text(message);
    $('#suggest').addClass('input_error');
    $('#notice').css('display', 'block');
    deleteMap();
}

function createMap(state, caption) {
    // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
    if (!map) {
        map = new ymaps.Map('pmap', state);
        placemark = new ymaps.Placemark(
            map.getCenter(), {
                iconCaption: caption,
                balloonContent: caption
            }, {
                preset: 'islands#redDotIconWithCaption'
            });
        map.geoObjects.add(placemark);
        // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
    } else {
        map.setCenter(state.center, state.zoom);
        placemark.geometry.setCoordinates(state.center);
        placemark.properties.set({iconCaption: caption, balloonContent: caption});
    }
}

function showMessage(message, address) {
    $('input[name="searchAddr"]').val(address);
    $('#suggest').blur();
    $('#messageHeader').text('Данные получены:');
    $('#message').text(message);
}

function deleteMap() {
    $('input[name="searchAddr"]').val('');
    // Удаляем карту.
    if (map) {
        map.destroy();
        map = null;
    }
}






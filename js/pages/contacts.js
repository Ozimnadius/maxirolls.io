/*YANDEX*/

var myMap = {
    map: '',
    placemarks: []
};
$(function () {
    ymaps.ready(init);



    function init() {

        var cmap = document.querySelector('#map');

        if (cmap) {
            var data = cmap.dataset,
                center = data.center;

            myMap.map = new ymaps.Map("map", {
                center: [data.centerX,data.centerY],
                zoom: data.zoom,
            });


            myMap.map.behaviors.disable(['scrollZoom']);



            $('.contact__link').each(function (x,i) {
                addPin(i.dataset);
            });

        }
    }

    function addPin(settings) {
       var pin = new ymaps.GeoObjectCollection(),
           placemark = new ymaps.Placemark([settings.baloonX,settings.baloonY], {
                balloonContentHeader: settings.baloonHeader,
                balloonContentBody: settings.baloonBody,
                balloonContentFooter: settings.baloonFooter,
                hintContent: settings.baloonContent
            },
            {
                iconLayout: 'default#image',
                preset: 'islands#redGlyphIcon'
            });
        pin.add(placemark);
        myMap.placemarks.push([settings.baloonX,settings.baloonY]);
        myMap.map.geoObjects.add(pin);

    }

    $('.contact__link').on('click', function (e) {

        myMap.map.setCenter(myMap.placemarks[this.dataset.id],17,{
            checkZoomRange: true
        });

    });
});
/*END YANDEX*/
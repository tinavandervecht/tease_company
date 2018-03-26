exports.init = init;

function init() {
    if ($('#map').length) {
        var latlng = {lat: 43.038613, lng: -80.883404};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: latlng,
            mapTypeControl: false,
            scrollwheel: false,
            streetViewControl: false,
            draggable: false,
            styles: [{"stylers":[{"hue":"#dd0d0d"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]}]
        });
        var marker = new google.maps.Marker({
            position: latlng,
            icon: {
                url: CCM_THEME_PATH + '/images/map-marker.png',
                scaledSize: new google.maps.Size(78, 114),
            },
            map: map
        });
    }
}
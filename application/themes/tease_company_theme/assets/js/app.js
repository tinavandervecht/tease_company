var matchHeight = require('./components/matchHeight');
var navArrows = require('./components/navArrows');

$(document).ready(function () {
    $(' .sub_nav_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $(' .review_slider').slick({
        vertical: true,
        verticalSwiping: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-up"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-down"></span></button>',
    });

    var stHeight = $('.review_slider .slick-list').height();
    $('.review_slider .review').each(function() {
        $(this).css('height', stHeight);
    });


    navArrows.init();
    matchHeight.init();


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

    $("form[name='contact_form']").validate();
});
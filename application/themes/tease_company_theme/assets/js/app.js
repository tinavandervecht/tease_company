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
});
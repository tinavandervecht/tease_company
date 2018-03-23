$(document).ready(function(){
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
});
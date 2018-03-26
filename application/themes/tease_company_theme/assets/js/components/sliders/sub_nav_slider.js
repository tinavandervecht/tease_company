exports.init = init;

function init() {
    $(' .sub_nav_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: window.GLOBAL.prevBtn,
        nextArrow: window.GLOBAL.nextBtn,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
}
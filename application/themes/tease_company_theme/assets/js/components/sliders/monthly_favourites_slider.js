exports.init = init;

function init() {
    $(' .monthly_favourites_slider').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        prevArrow: window.GLOBAL.prevBtn,
        nextArrow: window.GLOBAL.nextBtn,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1
                }
            }
        ]
    });
}
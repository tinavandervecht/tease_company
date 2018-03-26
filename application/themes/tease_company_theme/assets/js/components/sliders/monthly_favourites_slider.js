exports.init = init;

function init() {
    $(' .monthly_favourites_slider').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
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
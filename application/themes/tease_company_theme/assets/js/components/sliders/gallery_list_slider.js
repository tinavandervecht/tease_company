exports.init = init;

function init() {
    $(' .gallery_list_slider').slick({
        prevArrow: window.GLOBAL.prevBtn,
        nextArrow: window.GLOBAL.nextBtn
    });
}
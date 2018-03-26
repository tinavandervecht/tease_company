exports.init = init;

function init() {
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
}
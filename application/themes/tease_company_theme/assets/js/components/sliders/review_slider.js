exports.init = init;

function init() {
    $(' .review_slider').slick({
        vertical: true,
        verticalSwiping: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-up"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-down"></span></button>',
    });

    var height = 0;
    $('.review_slider .review').each(function() {
        if ($(this).outerHeight() > height) {
            height = $(this).outerHeight();
        }
    });

    $('.review_slider .review').each(function() {
        $(this).css('height', height);
    });

    if (height < $('.review_img').outerHeight() - 30) {
        $('.review_slider').addClass('absolute');
    }
}
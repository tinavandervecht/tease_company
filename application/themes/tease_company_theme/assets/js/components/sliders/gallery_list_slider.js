exports.init = init;

function init() {
    var selectedIndex = 0;
    $(' .gallery_list_slider').slick({
        prevArrow: window.GLOBAL.prevBtn,
        nextArrow: window.GLOBAL.nextBtn
    });

    $('#gallery_slider_modal .slider').slick({
        prevArrow: window.GLOBAL.prevBtn,
        nextArrow: window.GLOBAL.nextBtn,
        fade: true
    })

    $('.gallery_item').on('click', function() {
        selectedIndex = $(this).data('slide-num');
        $('#gallery_slider_modal .active_slide_count').html(selectedIndex + 1);
        $('#gallery_slider_modal .slider').slick('slickGoTo', selectedIndex);
        $('#gallery_slider_modal').modal('show');
    })

    $('#gallery_slider_modal').on('shown.bs.modal', function () {
        $('#gallery_slider_modal .slider').slick('setPosition');
        $('.overlay').addClass('active');
    })

    $('#gallery_slider_modal').on('hidden.bs.modal', function () {
        $('.overlay').removeClass('active');
    })

    $('#gallery_slider_modal .slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
        $('#gallery_slider_modal .active_slide_count').html(currentSlide + 1);
    });
}
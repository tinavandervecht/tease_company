window.GLOBAL = {
    nextBtn: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
    prevBtn: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>'
}

require('../../../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js');

var matchHeight = require('./components/matchHeight');
var navArrows = require('./components/navArrows');
var map = require('./components/map');
var GalleryListSlider = require('./components/sliders/gallery_list_slider');
var MonthlyFavouritesSlider = require('./components/sliders/monthly_favourites_slider');
var ReviewSlider = require('./components/sliders/review_slider');
var SubNavSlider = require('./components/sliders/sub_nav_slider');

$(document).ready(function () {
    navArrows.init();
    matchHeight.init();
    map.init();

    GalleryListSlider.init();
    MonthlyFavouritesSlider.init();
    ReviewSlider.init();
    SubNavSlider.init();

    $("form[name='contact_form']").validate();

    $('.mobile_nav_section .fa-close, .mobile_nav_button').on('click', function() {
        $('.mobile_nav_section').toggleClass('open');
        $('.overlay').toggleClass('active');
    });

    $('.mobile_nav_section button').on('click', function() {
        $(this).next('.sub_nav').slideToggle('fast');
    })

    window.addEventListener('resize', function() {
        if ($(window).width() > 768) {
            $('.mobile_nav_section').removeClass('open');
            $('.overlay').removeClass('active');
        }
    })

    $('.pinterest_btn').on('click', function() {
        PinUtils.pinOne({
            'media': $(this).data('pin-media')
        });
    })
});

$('.image_area').each(function(){
    var img = $('.image', this);
    var imgParent = $(this);
    function parallaxImg () {
        var speed = 0.75;
        var imgY = imgParent.offset().top;
        var winY = $(window).scrollTop();
        var winH = $(window).height();
        var parentH = imgParent.innerHeight();

        var winBottom = winY + winH;

        if (winBottom > imgY && winY < imgY + parentH) {
            var imgBottom = ((winBottom - imgY) * speed);
            var imgTop = winH + parentH;
            var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
        }
        img.css({
            top: imgPercent + '%',
            transform: 'translate(-50%, -' + imgPercent + '%)'
        });
    }
    $(document).on({
        scroll: function () {
            parallaxImg();
        }, ready: function () {
            parallaxImg();
        }
    });
});

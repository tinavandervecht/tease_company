window.GLOBAL = {
    nextBtn: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
    prevBtn: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>'
}

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

    $('.mobile_nav_section .close_btn, .mobile_nav_button').on('click', function() {
        $('.mobile_nav_section').toggleClass('open');
        $('.overlay._mobile').toggleClass('active');
    });

    $('.mobile_nav_section button').on('click', function() {
        $(this).toggleClass('open');
        $(this).next('.sub_nav').slideToggle('fast');
    })

    window.addEventListener('resize', function() {
        if ($(window).width() > 768) {
            $('.mobile_nav_section').removeClass('open');
            $('.overlay._mobile').removeClass('active');
        }
    })

    $('.pinterest_btn').on('click', function() {
        PinUtils.pinOne({
            'media': $(this).data('pin-media')
        });
    })

    $('.hash_link').on('click', function(e) {
        var currentBaseUrl = BASE_URL + window.location.pathname;
        var linkBaseUrl = $(this).attr('href').split('#')[0];

        if (currentBaseUrl == linkBaseUrl) {
            e.preventDefault();
            scrollPage('#' + $(this).attr('href').split("#").pop());
        }
    })

    if(window.location.href.indexOf("services") > -1 && window.location.href.indexOf("#") > -1) {
        scrollPage(window.location.hash);
    }
});

function scrollPage(hash) {
    var updatedHash = hash.replace(/\-/g, '_');

    var topPosition = $(updatedHash + '_section').offset().top - 50;

    $("html, body").animate({ scrollTop: topPosition }, 1000);
}

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

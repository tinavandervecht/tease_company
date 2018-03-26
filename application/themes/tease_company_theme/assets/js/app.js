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
});
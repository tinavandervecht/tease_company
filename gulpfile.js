var gulp     = require('gulp'),
    elixir   = require('laravel-elixir');

require('laravel-elixir-sass-compass');
require('laravel-elixir-imagemin');
require('laravel-elixir-vueify');
require('laravel-elixir-browserify-official');

var inProduction = elixir.config.production;
elixir.config.sourcemaps = false;
var baseThemePath = 'application/themes/tease_company_theme';
elixir.config.assetsPath = baseThemePath + '/assets';

elixir.config.images = {
    folder: baseThemePath + '/assets/images',
    outputFolder: baseThemePath + '/images'
};

elixir(function (mix) {
    /* ----
    SCSS processing
    Requires sass-globbing Ruby
    ---- */
    mix.compass('app.scss', baseThemePath + '/css', {
        require: ['sass-globbing'],
        style: inProduction ? "compressed" : ""
    });
    /* ----
    Scripts processing
    (with Browserify)
    ---- */
    mix.browserify('app.js', baseThemePath + '/js');

    /* ----
    Image Minifying
    And Processing
    ---- */
    mix.imagemin();
});

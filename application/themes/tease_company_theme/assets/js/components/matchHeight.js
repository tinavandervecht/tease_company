'use strict';

exports.init = init;

var matchHeight = require('jquery-match-height-browserify');

function init() {
    $('.match_height').matchHeight();
}
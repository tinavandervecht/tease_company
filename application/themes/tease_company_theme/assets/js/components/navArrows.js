'use strict';

exports.init = init;

function init() {
    positionNavArrows();
    window.addEventListener("resize", positionNavArrows);
}

function positionNavArrows() {
    $('.main_nav .nav-has-dropdown').each(function() {
        const leftPos = $(this).offset().left + ($(this).outerHeight() + 10);
        $('.sub-nav .after, .sub-nav .before', $(this)).css('left', leftPos);
    });
}
const slider = new Object;

slider.$container = $('#js-slick-slider');

if ( slider.$container.length ) {
    slider.$container.slick({
        adaptiveHeight: true,
        dots: true,
        fade: true
    });
}

$(document).ready(slider);

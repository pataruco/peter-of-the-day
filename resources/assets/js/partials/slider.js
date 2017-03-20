const slider = new Object;

slider.$containerMain = $('.js-slick-slider-main');
slider.$containerNav = $('.js-slick-slider-nav');

slider.$containerMain.slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     asNavFor: '.js-slick-slider-nav'
});

slider.$containerNav.slick({
     slidesToShow: 3,
     slidesToScroll: 1,
     asNavFor: '.js-slick-slider-main',
     dots: true,
     centerMode: true,
     focusOnSelect: true
})

$(document).ready(slider);

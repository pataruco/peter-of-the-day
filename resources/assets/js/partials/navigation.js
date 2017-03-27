const navigation = new Object();

navigation.$button = $('#js-toggle-slide-button');
navigation.$container = $('#js-toggle-slide-container');


navigation.$button.on('click', () => {
    navigation.$container.slideToggle(200);
})
$(document).ready(navigation);

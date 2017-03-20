const modal = new Object();

modal.$container = $('.js-modaal');

if (modal.$container.length) {
    modal.$container.modaal();
}

$(document).ready(modal);

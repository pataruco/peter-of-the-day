const calendar = new Object();

calendar.$container = $('#js-calendar-container');
calendar.$template = $('#js-calendar-template');


calendar.peterBday = moment("26-01-2017", "DD-MM-YYYY");
calendar.today = moment();

calendar.datesSelect = function (target) {
    console.log('a date is been click', target);
}
calendar.$container.clndr({
    startWithMonth: calendar.today,
    trackSelectedDate: true,
    constraints: {
        startDate: calendar.peterBday,
        endDate: calendar.today
    },
    clickEvents: {
        click: function (target) {
            calendar.datesSelect ( target )
        }
    }
});

$(document).ready(calendar);

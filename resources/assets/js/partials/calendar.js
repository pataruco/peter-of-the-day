const calendar = new Object();

calendar.$container = $('#js-calendar-container');

calendar.peterBday = moment("26-01-2017", "DD-MM-YYYY");
calendar.today = moment();

calendar.datesSelect = function (target) {
    console.log();
    if ( target.events.length ) {
        let dateId = target.events[0].id
        window.location = `/days/${dateId}`;
    }
}

calendar.settings = {
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
    },
    classes: {
        past: "past",
        today: "today",
        event: "event",
        selected: "selected",
        inactive: "inactive",
        lastMonth: "last-month",
        nextMonth: "next-month",
        adjacentMonth: "adjacent-month",
    },
    weekOffset: 1
}

calendar.render = function ( dates ) {
    calendar.settings.events = dates;
    calendar.$container.clndr(calendar.settings);
}

calendar.getDays = function () {
    axios.get('/json/days')
        .then( ( response ) => {
            let dates = response.data;
            calendar.render( dates )
        })
        .catch( ( error )=>  {
            console.error( error );
        });
}

if ( calendar.$container.length ) {
    $(window).on('load', calendar.getDays);
}

$( document ).ready( calendar );
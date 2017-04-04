// const calendar = new Object();
//
// moment.locale('es');
// calendar.$container = $('#js-calendar-container');
//
// calendar.peterBday = moment("26-01-2017", "DD-MM-YYYY");
// calendar.today = moment();
//
// calendar.datesSelect = function (target) {
//     console.log();
//     if ( target.events.length ) {
//         let dateId = target.events[0].id
//         window.location = `/days/${dateId}`;
//     }
// }
//
// calendar.settings = {
//     startWithMonth: calendar.today,
//     moment: moment,
//     trackSelectedDate: true,
//     constraints: {
//         startDate: calendar.peterBday,
//         endDate: calendar.today
//     },
//     clickEvents: {
//         click: function (target) {
//             calendar.datesSelect ( target )
//         }
//     },
//     classes: {
//         past: "past",
//         today: "today",
//         event: "event",
//         selected: "selected",
//         inactive: "inactive",
//         lastMonth: "last-month",
//         nextMonth: "next-month",
//         adjacentMonth: "adjacent-month",
//     },
//     weekOffset: 0
// }
//
// calendar.render = function ( dates ) {
//     calendar.settings.events = dates;
//     calendar.$container.clndr(calendar.settings);
// }
//
// calendar.getDays = function () {
//     axios.get('/json/days')
//         .then( ( response ) => {
//             let dates = response.data;
//             calendar.render( dates )
//         })
//         .catch( ( error )=>  {
//             console.error( error );
//         });
// }
//
// if ( calendar.$container.length ) {
//     $(window).on('load', calendar.getDays);
// }
//
// $( document ).ready( calendar );


// Using full calendar

const calendar = new Object();

calendar.$container = $('#js-calendar-container');

calendar.render = function ( dates ) {
    calendar.$container.fullCalendar({
        events: dates
    });
}

calendar.changeKeyOnDays = function ( dates ) {
    newDates = new Array();
    dates.forEach( function changeKeyValue( date ) {
        let newDate = {
            url: `/days/${date.id}`,
            date: date.date
        }
        newDates.push( newDate );
    })
    calendar.render( newDates )
}


calendar.getDays = function () {
    axios.get('/json/days')
        .then( ( response ) => {
            let dates = response.data;
            // console.log(dates);
            calendar.changeKeyOnDays( dates );
            // calendar.render( dates );
        })
        .catch( ( error )=>  {
            console.error( error );
        });
}

if ( calendar.$container.length ) {
    $(window).on('load', calendar.getDays);
}

$( document ).ready( calendar );

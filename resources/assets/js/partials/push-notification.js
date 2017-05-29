Echo.channel('notification-channel')
    .listen('DayCreated', (e) => {
        alert('hola');
    });

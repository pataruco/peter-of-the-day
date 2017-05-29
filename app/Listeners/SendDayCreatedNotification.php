<?php

namespace App\Listeners;

use App\Events\DayCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDayCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DayCreated  $event
     * @return void
     */
    public function handle(DayCreated $event)
    {
        //
    }
}

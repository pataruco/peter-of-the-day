<?php

namespace App\Listeners;

use App\Events\CreateDay;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification implements ShouldQueue
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
     * @param  CreateDay  $event
     * @return void
     */
    public function handle(CreateDay $event)
    {
        //
    }
}

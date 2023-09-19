<?php

namespace App\Listeners;

use App\Events\CheckTotal;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTotal
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
     * @param  CheckTotal  $event
     * @return void
     */
    public function handle(CheckTotal $event)
    {
        var_dump($event->week)


        }
}

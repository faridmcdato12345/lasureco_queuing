<?php

namespace App\Listeners;

use App\Events\ComplaintViewChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ComplaintViewChangedListener
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
     * @param  ComplaintViewChanged  $event
     * @return void
     */
    public function handle(ComplaintViewChanged $event)
    {
        //
    }
}

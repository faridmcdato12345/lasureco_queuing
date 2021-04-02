<?php

namespace App\Listeners;

use App\Events\ComplaintQueChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ComplaintQueChangedListener
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
     * @param  ComplaintQueChanged  $event
     * @return void
     */
    public function handle(ComplaintQueChanged $event)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\CashierViewChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CashierViewChangedListener
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
     * @param  CashierViewChanged  $event
     * @return void
     */
    public function handle(CashierViewChanged $event)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\CashierQueChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CashierQueChangedListener
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
     * @param  CashierQueChanged  $event
     * @return void
     */
    public function handle(CashierQueChanged $event)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\VideoChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoListener
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
     * @param  VideoChanged  $event
     * @return void
     */
    public function handle(VideoChanged $event)
    {
        //
    }
}

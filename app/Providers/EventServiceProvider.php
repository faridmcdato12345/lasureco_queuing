<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\CashierQueChanged' => [
            'App\Listeners\CashierQueChangedListener',
        ],
        'App\Events\ComplaintQueChanged' => [
            'App\Listeners\ComplaintQueChangedListener',
        ],
        'App\Events\CashierViewChanged' => [
            'App\Listeners\CashierViewChangedListener',
        ],
        'App\Events\ComplaintViewChanged' => [
            'App\Listeners\ComplaintViewChangedListener',
        ],
        'App\Events\VideoChanged' => [
            'App\Listeners\VideoListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

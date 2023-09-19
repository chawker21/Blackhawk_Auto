<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        
		'App\Events\CustomerCreated' => [
            'App\Listeners\SendSMSCustomer',
		'App\Listeners\Customer_log'
        ],
        'App\Events\CheckTotal' => [
            'App\Listeners\SendTotal'
            ],
        'App\Events\SMSEvent' => [
            'App/Listeners/SMSEventListener'
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

}

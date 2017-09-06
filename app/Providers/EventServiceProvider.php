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
        'App\Events\DeleteQuestion' => [
            'App\Listeners\DeleteFile',
        ],
        'App\Events\SaveQuestion' => [
            'App\Listeners\SaveFile',
        ],
        'App\Events\DeleteOptionsQuestion' => [
            'App\Listeners\DeleteOptions',
            'App\Listeners\DeleteFile',
        ],
        'App\Events\DeleteGridQuestion' => [
            'App\Listeners\DeleteRows',
            'App\Listeners\DeleteColumns',
            'App\Listeners\DeleteFile',
        ],
        'App\Events\ResponseCreated' => [
            'App\Listeners\FillResponse',
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

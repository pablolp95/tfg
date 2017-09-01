<?php

namespace App\Listeners;

use App\Events\DropdownDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteDropdownOptions
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
     * @param  DropdownDeleted  $event
     * @return void
     */
    public function handle(DropdownDeleted $event)
    {
        foreach ($event->dropdown->options as $option) {
            $option->delete();
        }
    }
}

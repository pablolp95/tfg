<?php

namespace App\Listeners;

use App\Events\MultipleChoiceDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteMultipleChoiceOptions
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
     * @param  MultipleChoiceDeleted  $event
     * @return void
     */
    public function handle(MultipleChoiceDeleted $event)
    {
        foreach ($event->multipleChoice->options as $option) {
            $option->delete();
        }
    }
}

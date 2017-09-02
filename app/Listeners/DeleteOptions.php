<?php

namespace App\Listeners;

use App\Events\QuestionWithOptionsDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteOptions
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
     * @param  QuestionWithOptionsDeleted  $event
     * @return void
     */
    public function handle(QuestionWithOptionsDeleted $event)
    {
        foreach ($event->question->options as $option) {
            $option->delete();
        }
    }
}

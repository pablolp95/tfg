<?php

namespace App\Listeners;

use App\Events\QuestionWithImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteImage
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
     * @param  QuestionWithImage  $event
     * @return void
     */
    public function handle(QuestionWithImage $event)
    {
        if(isset($event->question->image)){
            $event->question->image->delete();
        }
    }
}

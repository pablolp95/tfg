<?php

namespace App\Listeners;

use App\Events\QuestionWithVideo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteVideo
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
     * @param  QuestionWithVideo  $event
     * @return void
     */
    public function handle(QuestionWithVideo $event)
    {
        if($event->question->video != null){
            $event->question->video->delete();
        }
    }
}

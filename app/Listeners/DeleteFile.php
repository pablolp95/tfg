<?php

namespace App\Listeners;

use App\Events\QuestionFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteFile
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
     * @param  QuestionFile  $event
     * @return void
     */
    public function handle(QuestionFile $event)
    {
        if(isset($event->question->image)){
            $event->question->image->delete();
        }

        if($event->question->video != null){
            $event->question->video->delete();
        }
    }
}

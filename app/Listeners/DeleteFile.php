<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

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
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        if(isset($event->question->image)){
            Storage::delete($event->question->image->filename);
            $event->question->image->delete();
        }

        if($event->question->video != null){
            $event->question->video->delete();
        }
    }
}

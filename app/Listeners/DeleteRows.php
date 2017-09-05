<?php

namespace App\Listeners;

use App\Events\DeleteOptionsQuestion;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteRows
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
     * @param  DeleteOptionsQuestion  $event
     * @return void
     */
    public function handle(DeleteOptionsQuestion $event)
    {
        if(count($event->question->columns)){
            foreach ($event->question->columns as $column) {
                $column->delete();
            }
        }
    }
}

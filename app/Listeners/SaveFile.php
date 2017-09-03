<?php

namespace App\Listeners;

use App\Events\SaveQuestion;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Video;
use App\Image;

class SaveFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  SaveQuestion  $event
     * @return void
     */
    public function handle(SaveQuestion $event)
    {
        $question = $event->question;
        //Creación/actualización video asociado
        $video_url = $this->request->input('url');
        if(isset($video_url)) {
            $current_video = $question->video;

            if(is_null($current_video) || empty($current_video)){
                $current_video = new Video();
            }

            $current_video->url = $video_url;
            $question->video()->save($current_video);
        }
        else{
            if($question->video != null){
                $question->video->delete();
            }
        }

        //Creación/actualización imagen asociada
        if($this->request->hasFile('image_file')) {
            $current_image = $question->image;

            if(is_null($current_image) || empty($current_image)){
                $current_image = new Image();
            }
            else{
                Storage::delete($question->image->filename);
            }

            $name = $this->request->file('image_file')->getClientOriginalName();
            $current_image->filename = $this->request->file('image_file')->store('public/images');
            $current_image->original_filename = $name;
            $current_image->mime = $this->request->file('image_file')->extension();

            $question->image()->save($current_image);
        }
        else{
            if($question->image != null){
                Storage::delete($question->image->filename);
                $question->image->delete();
            }
        }
    }
}

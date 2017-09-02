<?php

namespace App\QuestionTypesModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Video;
use App\Events\QuestionWithVideo;
use App\Events\QuestionWithImage;


class ShortText extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'deleted' => QuestionWithVideo::class,
    ];

    /**
     * Get the question model.
     */
    public function question()
    {
        return $this->morphOne('App\Question', 'typable');
    }

    /**
     * Get the image model.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'question');
    }

    /**
     * Get the video model.
     */
    public function video()
    {
        return $this->morphOne('App\Video', 'question');
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(Request $request, $save = true)
    {
        $this->max_num_characters = $request->input('max_num_characters');
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;

        $video_url = $request->input('url');
        if(isset($video_url)) {
            $current_video = $this->video;

            if(is_null($current_video) || empty($current_video)){
                $current_video = new Video();
            }

            $current_video->url = $video_url;
            $this->video()->save($current_video);
        }
        else{
            if($this->video != null){
                $this->video->delete();

            }
        }
    }
}

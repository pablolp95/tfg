<?php

namespace App\Models\QuestionTypes;

use App\Events\DeleteQuestion;
use App\Events\SaveQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Number extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'deleted' => DeleteQuestion::class,
        'saved' => SaveQuestion::class,
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
        $this->range_min = $request->input('range_min');
        $this->range_max = $request->input('range_max');
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;
    }
}
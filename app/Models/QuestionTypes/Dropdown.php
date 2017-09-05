<?php

namespace App\Models\QuestionTypes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\QuestionOption;
use App\Events\DeleteOptionsQuestion;
use App\Events\SaveQuestion;

class Dropdown extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'deleted' => DeleteOptionsQuestion::class,
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
     * Get the options.
     */
    public function options()
    {
        return $this->morphMany('App\QuestionOption', 'typable');
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
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;

        $options_id = $request->input('options_id');
        $options_value = $request->input('options_value');

        if(isset($options_id) && isset($options_value)){
            $current_options = $this->options;

            foreach ($current_options as $current_option){
                if(!array_has($options_id, $current_option->id)){
                    $current_option->delete();
                }
            }


            $min = min(count($options_id), count($options_value));

            for($position = 0; $position < $min; $position++) {
                $option = $this->options->where('id', $options_id[$position])->first();

                if(is_null($option) || empty($option)){
                    $option = new QuestionOption();
                }

                $option->option_value = $options_value[$position];
                $option->position = $position;
                $this->options()->save($option);
            }

        }
        else {
            $current_options = $this->options;
            foreach ($current_options as $current_option){
                $current_option->delete();
            }
        }

    }
}

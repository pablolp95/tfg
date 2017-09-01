<?php

namespace App\QuestionTypesModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Scale extends Model
{
    /**
     * Get the question model.
     */
    public function question()
    {
        return $this->morphOne('App\Question', 'typable');
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
        $this->left_tag = $request->input('left_tag');
        $this->right_tag = $request->input('right_tag');
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;
    }
}

<?php

namespace App\QuestionTypesModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Declaration extends Model
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
        $this->button_text = $request->input('button_text');

        ($save) ? $this->save() : null;
    }
}

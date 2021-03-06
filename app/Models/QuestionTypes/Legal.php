<?php

namespace App\Models\QuestionTypes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Legal extends Model
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
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;
    }
}

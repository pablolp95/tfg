<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutipleChoice extends Model
{
    /**
     * Get the options.
     */
    public function options()
    {
        return $this->morphMany('App\QuestionOption', 'typable');
    }

}

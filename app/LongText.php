<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LongText extends Model
{
    /**
     * Get the question model.
     */
    public function question()
    {
        return $this->morphOne('App\Question', 'typable');
    }
}

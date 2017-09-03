<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Get type of answer
     */
    public function typable()
    {
        return $this->morphTo();
    }

    /**
     * Get the form that owns the question.
     */
    public function response()
    {
        return $this->belongsTo('App\Response');
    }

    /**
     * Get the form that owns the question.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get type of question
     */
    public function typable()
    {
        return $this->morphTo();
    }

    /**
     * Get the form that owns the question.
     */
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}

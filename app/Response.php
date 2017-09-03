<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * Get the form that owns the question.
     */
    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    /**
     * Get the answers of the response
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    /**
     * Get the workspace that owns the form.
     */
    public function workspace()
    {
        return $this->belongsTo('App\Workspace');
    }

    /**
     * Get the workspace that owns the form.
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * Get the workspace that owns the form.
     */
    public function responses()
    {
        return $this->hasMany('App\Response');
    }
}

<?php

namespace App;

use App\Events\ResponseCreated;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'created' => ResponseCreated::class,
    ];

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

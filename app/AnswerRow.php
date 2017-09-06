<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerRow extends Model
{
    /**
     * Get the answer.
     */
    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

    /**
     * Get the row.
     */
    public function row()
    {
        return $this->belongsTo('App\Row');
    }
}

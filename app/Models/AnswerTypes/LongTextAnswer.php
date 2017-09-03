<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LongTextAnswer extends Model
{
    /**
     * Get the answer model.
     */
    public function answer()
    {
        return $this->morphOne('App\Answer', 'typable');
    }
}

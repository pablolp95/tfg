<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    /**
     * Get the question that owns the row.
     */
    public function grid()
    {
        return $this->belongsTo('App\Models\QuestionTypes\Grid');
    }
}

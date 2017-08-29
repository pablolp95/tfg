<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    /**
     * Get type of question
     */
    public function typable()
    {
        return $this->morphTo();
    }
}

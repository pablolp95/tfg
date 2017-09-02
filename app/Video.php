<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get owner
     */
    public function question()
    {
        return $this->morphTo();
    }
}

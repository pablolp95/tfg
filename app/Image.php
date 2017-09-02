<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Get owner
     */
    public function question()
    {
        return $this->morphTo();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageOption extends Model
{
    /**
     * Get type of question
     */
    public function pictureChoice()
    {
        return $this->belongsTo('App\QuestionTypesModels\PictureChoice');
    }
}

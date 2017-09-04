<?php

namespace App\Models\AnswerTypes;

use Illuminate\Database\Eloquent\Model;

class DateAnswer extends Model
{
    /**
     * Get the answer model.
     */
    public function answer()
    {
        return $this->morphOne('App\Answer', 'typable');
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param $value
     * @return mixed
     */
    public  function silentSave($value) {
        $this->answer = $value;
        $this->save();
    }

}

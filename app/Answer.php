<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Answer extends Model
{
    /**
     * Get type of answer
     */
    public function typable()
    {
        return $this->morphTo();
    }

    /**
     * Get the form that owns the question.
     */
    public function response()
    {
        return $this->belongsTo('App\Response');
    }

    /**
     * Get the form that owns the question.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param $question_id
     * @param $value
     * @return mixed
     */
    public function silentSave($question_id, $value){
        $question = Question::findOrFail($question_id);

        $className = 'App\\Models\\AnswerTypes\\' . $question->typable_type . 'Answer';
        $answerType = new $className;

        $answerType->silentSave($value);
        $answerType->answer()->save($this);

    }
}

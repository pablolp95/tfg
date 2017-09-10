<?php

namespace App\Models\QuestionTypes;

use App\Events\DeleteQuestion;
use App\Events\SaveQuestion;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class Hour extends QuestionType
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'deleted' => DeleteQuestion::class,
        'saved' => SaveQuestion::class,
    ];

    /**
     * Basic save operation used for update & store.
     *
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(Request $request, $save = true)
    {
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;
    }
}

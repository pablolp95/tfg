<?php

namespace App\Models\QuestionTypes;

use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Events\DeleteQuestion;
use App\Events\SaveQuestion;

class Declaration extends QuestionType
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
        $this->button_text = $request->input('button_text');

        ($save) ? $this->save() : null;
    }
}

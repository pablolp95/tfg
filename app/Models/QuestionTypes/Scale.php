<?php

namespace App\Models\QuestionTypes;

use App\Events\DeleteQuestion;
use App\Events\SaveQuestion;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class Scale extends QuestionType
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
        $this->range_min = $request->input('range_min');
        $this->range_max = $request->input('range_max');
        $this->left_tag = $request->input('left_tag');
        $this->right_tag = $request->input('right_tag');
        $this->required = $request->input('required');

        ($save) ? $this->save() : null;
    }
}

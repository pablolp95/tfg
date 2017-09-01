<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the view of the specified question type.
     *
     * @param  int  $type
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $view = 'forms.modals.'.$type.'.create';
        return view($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->icon = $request->input('icon');
        $question->form_id = $request->input('form_id');
        $question->position = $request->input('position');

        $className = 'App\\QuestionTypesModels\\' . $request->input('type');
        $type = new $className;

        $this->silentSave($question, $type, $request);

        return $question->toJson();
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(&$question, &$type ,Request $request, $save = true)
    {
        $question->text = $request->input('text');
        $question->description = $request->input('description');
        $question->last_update_user_id = Auth::id();

        $type->silentSave($request);
        $type->question()->save($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $type = $question->typable_type;
        $view = 'forms.modals.'.$type.'.edit';
        return view($view, compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return String
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $type = $question->typable;

        $this->silentSave($question, $type, $request);
        return $question->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->typable->delete();
        $question->delete();
    }

    /**
     * Update the order of the questions associated
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateQuestionOrder(Request $request)
    {
        $questions_order = $request->input('order');
        foreach ($questions_order['questions'] as $index => $value){
            $question = Question::find($value['id']);
            $question->position = $value['position'];
            $question->save();
        }

    }

}

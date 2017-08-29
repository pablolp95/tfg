<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->text = $request->input('text');
        $question->description = $request->input('description');
        $question->icon = $request->input('icon');
        $question->form_id = $request->input('form_id');
        $question->last_update_user_id = Auth::id();

        $className = 'App\\QuestionTypesModels\\' . $request->input('type');
        $type = new $className;

        $type->silentSave($request);
        $type->question()->save($question);

        return $question->id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$form = Form::findOrFail($id);
        //$this->silentSave($form, $request);
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
        $question->delete();
    }

    /**
     * Display the view of the specified question type.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getModalType(Request $request, $id)
    {
        $view = 'Ha ocurrido un error';

        switch ($id) {
            case 0:
                $view = 'forms.modals.shortText';
                break;
            case 1:
                $view = 'forms.modals.longText';
                break;
            case 2:
                $view = 'forms.modals.declaration';
                break;
            case 3:
                $view = 'forms.modals.dropdown';
                break;
            case 4:
                $view = 'forms.modals.email';
                break;
            case 5:
                $view = 'forms.modals.date';
                break;
            case 6:
                $view = 'forms.modals.legal';
                break;
            case 7:
                $view = 'forms.modals.web';
                break;
            case 8:
                $view = 'forms.modals.multipleChoice';
                break;
            case 9:
                $view = 'forms.modals.pictureChoice';
                break;
            case 10:
                $view = 'forms.modals.yesNo';
                break;
            case 11:
                $view = 'forms.modals.rating';
                break;
            case 12:
                $view = 'forms.modals.scale';
                break;
            case 13:
                $view = 'forms.modals.number';
                break;
        }
        return view($view);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Form;
use App\Response;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
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
        $form = new Form();
        $form->workspace_id = $request->input('workspace_id');
        $this->silentSave($form, $request);

        return redirect()->route('forms.show',[$form->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::findOrFail($id);
        if(Auth::id() == $form->Workspace->user_id)
            return view('forms.build', compact('form'));
        abort(403, 'Unauthorized action.');
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
        $form = Form::findOrFail($id);
        $this->silentSave($form, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param $form
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(&$form, Request $request, $save = true)
    {
        $form->last_update_user_id = Auth::id();
        $form->name = $request->input('name');

        ($save) ? $form->save() : null;
        return $form;
    }

    /**
     * Display the design view of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDesign($id)
    {
        $form = Form::findOrFail($id);
        if(Auth::id() == $form->Workspace->user_id)
            return view('forms.design', compact('form'));
        abort(403, 'Unauthorized action.');
    }

    /**
     * Display the share view of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShare($id)
    {
        $form = Form::findOrFail($id);
        if(Auth::id() == $form->Workspace->user_id)
            return view('forms.share', compact('form'));
        abort(403, 'Unauthorized action.');
    }

    /**
     * Display the analyze view of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAnalyze($id)
    {
        $form = Form::findOrFail($id);
        if(Auth::id() == $form->Workspace->user_id)
            return view('forms.analyze', compact('form'));
        abort(403, 'Unauthorized action.');
    }

    public function getGlobalStats() {
        return view('forms.analyze.global_stats')->render();
    }

    public function getSingleStats($id) {
        $form = Form::findOrFail($id);

        return view('forms.analyze.single_stats', ['form' => $form])->render();

    }

    public function getResponseStats($id){
        $form = Form::findOrFail($id);
        $responses = Response::where('form_id', $id)->orderBy('created_at', 'asc')->simplePaginate(1);
        $answers = [];
        foreach ($responses as $response) {
            foreach ($form->questions as $question) {
                if($response->answers->contains('question_id', $question->id)){
                    $answer = $response->answers->where('question_id', $question->id);
                    $answers[$question->id] = $answer;
                }
                else {
                    $answers[$question->id] = NULL;
                }
            }
        }
        return view('forms.analyze.response_stats', ['form' => $form,'answers' => $answers])->render();
    }
}

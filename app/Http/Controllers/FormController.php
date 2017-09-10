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

    public function getGlobalStats($id) {
        $form = Form::findOrFail($id);
        $results = null;
        foreach ($form->questions as $question) {
            if($question->answers->isNotEmpty()){
                switch ($question->typable_type) {
                    case 'Grid':
                        $results[$question->id] = array('labels' => array(), 'columns' => array());
                        $grid = $question->typable;
                        foreach ($grid->columns as $column) {
                            $results[$question->id]['columns'][$column->value] = array();
                            $count = 0;
                            foreach ($grid->rows as $row){
                                if(!in_array($row->value, $results[$question->id]['labels'])){
                                    array_push($results[$question->id]['labels'], $row->value);
                                }
                                $count += $question->answers->filter(function ($model) use ($column, $row) {
                                    return $model->value == $column->value && $model->row->row_id == $row->id;
                                })->count();
                                array_push($results[$question->id]['columns'][$column->value], $count);
                                $count = 0;
                            }
                        }
                        break;
                    case 'Dropdown':
                        $results[$question->id] = array('labels' => array(), 'count_options' => array());
                        $count = 0;
                        foreach ($question->typable->options as $option){
                            array_push($results[$question->id]['labels'], $option->option_value);
                            $count += $question->answers->filter(function ($model) use ($option) {
                                return $model->value == $option->option_value;
                            })->count();
                            array_push($results[$question->id]['count_options'], $count);
                            $count = 0;
                        }
                        break;
                    case 'Scale':
                        $results[$question->id] = array('labels' => array(), 'values' => array());
                        $count = 0;
                        for ($i = $question->typable->range_min; $i <= $question->typable->range_max; ++$i){
                            array_push($results[$question->id]['labels'], $i);
                            $count += $question->answers->filter(function ($model) use ($i) {
                                return $model->value == $i;
                            })->count();
                            array_push($results[$question->id]['values'], $count);
                            $count = 0;
                        }
                        break;
                    case 'MultipleChoice':
                        $results[$question->id] = array('labels' => array(), 'count_options' => array());
                        $count = 0;
                        foreach ($question->typable->options as $option){
                            array_push($results[$question->id]['labels'], $option->option_value);
                            $count += $question->answers->filter(function ($model) use ($option) {
                                return $model->value == $option->option_value;
                            })->count();
                            array_push($results[$question->id]['count_options'], $count);
                            $count = 0;
                        }
                        break;
                    case 'Number':
                        $results[$question->id] = array('labels' => array(), 'counts' => array());
                        $count = 0;
                        $answers = $question->answers->sortBy('value');
                        while($answers->isNotEmpty()){
                            $answer = $answers->first();
                            array_push($results[$question->id]['labels'], $answer->value);
                            $count += $answers->filter(function ($model) use ($answer) {
                                return $model->value == $answer->value;
                            })->count();
                            $answers = $answers->reject(function ($model) use ($answer){
                                return $model->value == $answer->value;
                            });
                            array_push($results[$question->id]['counts'], $count);
                            $count = 0;
                        }
                        break;
                }
            }
        }
        //Log::info($results);
        return view('forms.analyze.global_stats', ['results' => $results, 'form' => $form])->render();
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

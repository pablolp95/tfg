<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Response;
use App\Form;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = new Response();
        $response->form_id = $request->input('form_id');
        $response->save();

        $answers = $request->input('form_answer');
        foreach ($answers as $question_id => $value) {
            if (is_array($value)) {
                foreach ($value as $answer_value) {
                    if(isset($answer_value)){
                        $answer = new Answer();
                        $answer->response_id = $response->id;
                        $answer->question_id = $question_id;
                        $answer->value = $answer_value;

                        $response->answers()->save($answer);
                    }
                }
            }
            else {
                if (isset($value)) {
                    $answer = new Answer();
                    $answer->response_id = $response->id;
                    $answer->question_id = $question_id;
                    $answer->value = $value;

                    $response->answers()->save($answer);

                }
            }
        }

        return view('publicForms.submited');
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

        return view('publicForms.submit', compact('form'));
    }
}
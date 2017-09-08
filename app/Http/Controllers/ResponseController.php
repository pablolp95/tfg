<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Response;
use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return redirect(route('form.submitted'));
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

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubmitted()
    {
        return view('publicForms.submitted', compact('form'));
    }
}
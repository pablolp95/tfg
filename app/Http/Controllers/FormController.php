<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Form;

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
        $this->silentSave($form,$request);

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

    /**
     * Display the analyze view of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getModalType(Request $request, $id)
    {
        switch ($id) {
            case 0:
                return view('forms.modals.shortText');
                break;
            case 1:
                return view('forms.modals.longText');
                break;
            case 2:
                return view('forms.modals.declaration');
                break;
            case 3:
                return view('forms.modals.dropdown');
                break;
            case 4:
                return view('forms.modals.email');
                break;
            case 5:
                return view('forms.modals.date');
                break;
            case 6:
                return view('forms.modals.legal');
                break;
            case 7:
                return view('forms.modals.web');
                break;
            case 8:
                return view('forms.modals.multipleChoices');
                break;
            case 9:
                return view('forms.modals.multipleImages');
                break;
            case 10:
                return view('forms.modals.yesNo');
                break;
            case 11:
                return view('forms.modals.rating');
                break;
            case 12:
                return view('forms.modals.scale');
                break;
            case 13:
                return view('forms.modals.number');
                break;
        }
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}

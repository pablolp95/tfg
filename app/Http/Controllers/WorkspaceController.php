<?php

namespace App\Http\Controllers;

use App\Workspace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workspace = new Workspace();
        $workspace->user_id = Auth::id();
        $this->silentSave($workspace,$request);

        return redirect()->route('workspaces.show',[$workspace->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = Workspace::findOrFail($id);
        if(Auth::id() == $workspace->user_id)
            return view('workspaces.workspace', compact('workspace'));
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id = $request['id'];
        $workspace = Workspace::findOrFail($id);
        $this->silentSave($workspace, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workspace = Workspace::findOrFail($id);
        $workspace->delete();
        return redirect()->route('login');
    }

    /**
     * Basic save operation used for update & store.
     *
     * @param $workspace
     * @param Request $request
     * @param bool $save
     * @return mixed
     */
    public function silentSave(&$workspace, Request $request, $save = true)
    {
        $workspace->last_update_user_id = Auth::id();
        $workspace->name = $request->input('name');

        ($save) ? $workspace->save() : null;
        return $workspace;
    }
}

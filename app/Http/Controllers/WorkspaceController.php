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
     * Show the application dashboard.
     *
     * @var id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = Workspace::findOrFail($id);
        if(Auth::id() == $workspace->user_id)
            return view('home');
        abort(403, 'Unauthorized action.');
    }
}

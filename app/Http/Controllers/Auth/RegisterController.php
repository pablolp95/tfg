<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use App\Workspace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Redefine the method to use a custom generation logic
     *
     */
    protected function redirectTo()
    {
        if(Auth::user()->hasAnyRole(['superadmin','admin'])){
            $route = '/admin';
        }
        else {
            $workspace_id = Auth::user()->default_workspace;
            $route = '/workspaces/'.$workspace_id;
        }

        return $route;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //Assign a default role to the new registered user
        $user->roles()->attach(Role::where('name', 'user')->first());

        //We assign a default workspace to the new registered user
        $workspace = Workspace::create([
            'user_id' => $user->id,
            'last_update_user_id' => $user->id,
            'name' => 'Mi espacio'
        ]);

        $user->default_workspace = $workspace->id;
        $user->save();

        return $user;
    }
}

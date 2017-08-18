<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('workspaces/{id}', ['as' => 'workspaces', 'uses' => 'WorkspaceController@show']);
Route::get('admin', ['as' => 'workspaces', 'uses' => function() {
    return view('intranet.dashboard');
}]);

Route::resource('workspaces', 'WorkspaceController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);
Route::resource('forms', 'FormController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);
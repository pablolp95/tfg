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
Route::get('admin', ['as' => 'dashboard', 'uses' => function() {
    return view('intranet.dashboard');
}]);

Route::resource('workspaces', 'WorkspaceController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);

Route::post('forms', ['as' => 'forms.store', 'uses' => 'FormController@store']);
Route::delete('forms/{id}', ['as' => 'forms.destroy', 'uses' => 'FormController@destroy']);
Route::get('forms/{id}/build', ['as' => 'forms.build', 'uses' => 'FormController@getBuild']);
Route::get('forms/{id}/design', ['as' => 'forms.design', 'uses' => 'FormController@getDesign']);
Route::get('forms/{id}/share', ['as' => 'forms.share', 'uses' => 'FormController@getShare']);
Route::get('forms/{id}/analyze', ['as' => 'forms.analyze', 'uses' => 'FormController@getAnalyze']);
Route::put('forms/{id}/build', ['as' => 'forms.build.update', 'uses' => 'FormController@putBuild']);
Route::put('forms/{id}/design', ['as' => 'forms.design.update', 'uses' => 'FormController@putDesign']);



/*Route::resource('forms', 'FormController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);*/
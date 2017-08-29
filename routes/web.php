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

Route::get('admin', ['as' => 'dashboard', 'uses' => function() {
    return view('intranet.dashboard');
}]);

Route::resource('workspaces', 'WorkspaceController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);

Route::post('forms', ['as' => 'forms.store', 'uses' => 'FormController@store']);
Route::delete('forms/{id}', ['as' => 'forms.destroy', 'uses' => 'FormController@destroy']);
Route::get('forms/{id}/build', ['as' => 'forms.show', 'uses' => 'FormController@show']);
Route::get('forms/{id}/design', ['as' => 'forms.design', 'uses' => 'FormController@getDesign']);
Route::get('forms/{id}/share', ['as' => 'forms.share', 'uses' => 'FormController@getShare']);
Route::get('forms/{id}/analyze', ['as' => 'forms.analyze', 'uses' => 'FormController@getAnalyze']);
Route::put('forms/{id}', ['as' => 'forms.update', 'uses' => 'FormController@update']);
Route::put('forms/{id}/design', ['as' => 'forms.design.update', 'uses' => 'FormController@putDesign']);

Route::get('questions/type/{id}', ['as' => 'forms.type', 'uses' => 'QuestionController@getModalType']);
Route::post('questions', ['as' => 'questions.store', 'uses' => 'QuestionController@store']);
Route::delete('questions/{id}', ['as' => 'questions.destroy', 'uses' => 'QuestionController@destroy']);


/*Route::resource('forms', 'FormController', ['only' => [
    'store', 'show', 'update', 'destroy'
]]);*/
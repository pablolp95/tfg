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

Route::get('forms/{id}/build', ['as' => 'forms.show', 'uses' => 'FormController@show']);
Route::get('forms/{id}/share', ['as' => 'forms.share', 'uses' => 'FormController@getShare']);
Route::get('forms/{id}/analyze', ['as' => 'forms.analyze', 'uses' => 'FormController@getAnalyze']);
Route::get('forms/{id}/analyze/global_stats', ['as' => 'forms.global_stats', 'uses' => 'FormController@getGlobalStats']);
Route::get('forms/{id}/analyze/single_stats', ['as' => 'forms.single_stats', 'uses' => 'FormController@getSingleStats']);
Route::get('forms/{id}/analyze/response_stats', ['as' => 'forms.response_stats', 'uses' => 'FormController@getResponseStats']);
Route::post('forms', ['as' => 'forms.store', 'uses' => 'FormController@store']);
Route::put('forms/{id}', ['as' => 'forms.update', 'uses' => 'FormController@update']);
Route::delete('forms/{id}', ['as' => 'forms.destroy', 'uses' => 'FormController@destroy']);

Route::get('questions/create/{type}', ['as' => 'questions.create', 'uses' => 'QuestionController@create']);
Route::get('questions/{id}/edit', ['as' => 'questions.edit', 'uses' => 'QuestionController@edit']);
Route::post('questions', ['as' => 'questions.store', 'uses' => 'QuestionController@store']);
Route::put('questions/{id}', ['as' => 'questions.update', 'uses' => 'QuestionController@update']);
Route::put('questions/update/order', ['as' => 'questions.update.order', 'uses' => 'QuestionController@updateQuestionOrder']);
Route::delete('questions/{id}', ['as' => 'questions.destroy', 'uses' => 'QuestionController@destroy']);


Route::get('view/form/{id}', ['as' => 'form.view', 'uses' => 'ResponseController@show']);
Route::get('form/submitted', ['as' => 'form.submitted', 'uses' => 'ResponseController@showSubmitted']);
Route::post('submit/form/', ['as' => 'form.submit', 'uses' => 'ResponseController@store']);

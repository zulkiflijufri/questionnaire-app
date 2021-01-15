<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires', 'QuestionnaireController@index')->name('questionnaires.index');
Route::get('/questionnaires/create', 'QuestionnaireController@create')->name('questionnaire.create');
Route::post('/questionnaires/store', 'QuestionnaireController@store')->name('questionnaire.store');
Route::get('/questionnaires/{questionnaire}/show', 'QuestionnaireController@show')->name('questionnaire.show');

Route::get('/questionnaires/{questionnaire}/question/create', 'QuestionController@create')->name('question.create');
Route::post('/questionnaires/{questionnaire}/question/store', 'QuestionController@store')->name('question.store');

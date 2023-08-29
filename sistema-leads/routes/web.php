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

Route::namespace('App\Http\Controllers')->group(function () {

    Route::get('/', function(){
        return redirect()->route('home');
    });

    Route::get('/{slug}', 'GuestController@index');
    Route::post('/{slug}', 'GuestController@store');
    Route::get('/{slug}/obrigado', 'GuestController@thanks')->name('thanks');

    Route::prefix('painel')->group(function () {
        Route::get('/termos-de-uso', 'TermsController@terms')->name('terms');
        Route::get('/politica-de-privacidade', 'TermsController@privacy')->name('privacy');

        Route::get('/home', 'QuizController@index')->name('home');
        Route::get('/quiz', 'QuizController@create')->name('quiz.create');
        Route::post('/quiz', 'QuizController@store');

        Route::get('/quiz/{id}', 'QuizController@show')->name('quiz.show');
        Route::post('/quiz/{id}/delete', 'QuizController@delete')->name('quiz.delete');


        Route::get('/leads', 'LeadsController@index')->name('leads');
        Auth::routes();
    });



});


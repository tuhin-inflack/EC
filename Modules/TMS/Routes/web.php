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

Route::prefix('tms')->group(function() {
    Route::get('/', 'TMSController@index');

    // Route group for all request regarding training
    Route::prefix('training')->group(function() {
        Route::get('/', 'TrainingController@index');
        Route::get('/create', 'TrainingController@create');
        Route::post('/create', 'TrainingController@store');
        Route::get('/show/{training_id}', 'TrainingController@show');
        Route::get('/{training_id}/edit', 'TrainingController@edit');
        Route::post('edit/{training_id}', 'TrainingController@update');
        Route::delete('{training_id}', 'TrainingController@destroy');
    });

    // Route group for all request regarding trainee
    Route::prefix('trainee')->group(function() {
        Route::get('/', 'TraineeController@index');
        Route::post('/', 'TraineeController@index');
        Route::get('/import/to/{training_id}', 'TraineeController@import');
        Route::post('/import/to/{training_id}', 'TraineeController@import');
        Route::post('/import/store/{training_id}', 'TraineeController@storeImported');
        Route::get('/add/to/{training_id}', 'TraineeController@create');
        Route::post('/add/to/{training_id}', 'TraineeController@store');
        Route::get('/edit/{trainee_id}', 'TraineeController@edit');
        Route::post('/edit/{trainee_id}', 'TraineeController@update');
        Route::delete('/delete/{trainee_id}', 'TraineeController@destroy');
    });
});

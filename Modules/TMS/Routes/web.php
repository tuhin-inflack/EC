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
    Route::get('get-trainees-of-training/{trainingId}', 'TMSController@getTraineesOfTraining'); // Important and Temporary
    Route::get('/', 'TrainingController@index');

    // Route group for all request regarding training
    Route::prefix('training')->group(function() {
        Route::get('/', 'TrainingController@index')->name('training.index');
        Route::get('/create', 'TrainingController@create')->name('training.create');
        Route::post('/create', 'TrainingController@store')->name('training.store');
        Route::get('/show/{training_id}', 'TrainingController@show')->name('training.show');
        Route::get('/{training_id}/edit', 'TrainingController@edit')->name('training.edit');
        Route::post('edit/{training_id}', 'TrainingController@update')->name('training.update');
        Route::delete('{training_id}', 'TrainingController@destroy')->name('training.delete');
    });

    // Route group for all request regarding trainee
    Route::prefix('trainee')->group(function() {
        Route::get('/{trainingId?}', 'TraineeController@index')->name('trainee.index');
        Route::get('/import/to/{training_id}', 'TraineeController@import')->name('trainee.import');
        Route::post('/import/to/{training_id}', 'TraineeController@import')->name('trainee.saveImported');
        Route::post('/import/store/{training_id}', 'TraineeController@storeImported');
        Route::get('/add/to/{training_id}', 'TraineeController@create')->name('trainee.add');
        Route::post('/add/to/{training_id}', 'TraineeController@store')->name('trainee.store');
        Route::get('/edit/{trainee_id}', 'TraineeController@edit')->name('trainee.edit');
        Route::post('/edit/{trainee_id}', 'TraineeController@update')->name('trainee.update');
        Route::get('/show/{training_id}', 'TraineeController@show')->name('trainee.show');
        Route::delete('/delete/{trainee_id}', 'TraineeController@destroy')->name('trainee.delete');
    });
});

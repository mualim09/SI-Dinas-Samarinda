<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// $this->get('users', 'UsersController@index')->name('users');

Route::group(['prefix' => 'document', 'name' => 'document.'], function(){
    Route::get('/', 'DocumentsController@index')->name('index');
    Route::get('/sequence-letter', 'DocumentsController@sequenceLetter')->name('sequenceLetter');
    Route::get('/file/{id}', 'DocumentsController@file')->name('file');
    Route::post('/store', 'DocumentsController@store')->name('store');
    Route::post('/delete/{id}', 'DocumentsController@destroy')->name('delete');
});
Route::group(['prefix' => 'person-in-charge', 'name' => 'personInCharge.'], function(){
    Route::get('/', 'PersonInChargeController@index')->name('index');
    Route::get('/fetch-data', 'PersonInChargeController@fetchData')->name('fetchData');
    Route::post('/store', 'PersonInChargeController@store')->name('store');
    Route::post('/update/{id}', 'PersonInChargeController@update')->name('update');
    Route::post('/delete/{id}', 'PersonInChargeController@destroy')->name('delete');
});
Route::group(['prefix' => 'job', 'name' => 'job.'], function(){
    Route::get('/', 'JobsController@index')->name('index');
    Route::get('/fetch-data', 'JobsController@fetchData')->name('fetchData');
    Route::post('/store', 'JobsController@store')->name('store');
    Route::post('/update/{id}', 'JobsController@update')->name('update');
    Route::post('/delete/{id}', 'JobsController@destroy')->name('delete');
});
Route::group(['prefix' => 'activity', 'name' => 'job.'], function(){
    Route::get('/', 'ActivitiesController@index')->name('index');
    Route::get('/fetch-data', 'ActivitiesController@fetchData')->name('fetchData');
    Route::post('/store', 'ActivitiesController@store')->name('store');
    Route::post('/update/{id}', 'ActivitiesController@update')->name('update');
    Route::post('/delete/{id}', 'ActivitiesController@destroy')->name('delete');
});

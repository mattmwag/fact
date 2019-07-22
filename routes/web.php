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
    
    use Illuminate\Support\Facades\App;
    
    Route::get('/', 'FactController@hello');

    Route::get('/facts', 'FactController@index');
    
    Route::get('/facts/{fact}', 'FactController@show');
    
    Route::post('/facts', 'FactController@store');

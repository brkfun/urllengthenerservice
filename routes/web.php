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

Route::get('/', 'HomeController@index');
Route::post('/sendUrl', 'UrlController@send')->name('sendUrl');
Route::get('/lengthener/{urlCode}','UrlController@decode')->name('len');
Route::get('sessionFlusher',function (){
    if(app()->environment() === 'development'){
        session()->flush();
        return response()->json('done');
    }
    abort(404);
    return null;
});

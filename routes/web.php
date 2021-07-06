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
    return redirect('/fragestellen');
});

Route::group(['prefix' => '016096372673'], function() {
    Route::auth();
});

Route::get('/home', function (){
    return redirect('/fragen');
})->name('home');
Route::get('/fragestellen', 'FragenstellenController@index');
Route::post('/fragestellen', 'FragenstellenController@fragestellen')->name('frage.stellen');

Route::get('/fragen', function (){
    return view('crud');
})->middleware('auth')->name('fragen');

Route::get('/bauchbinde', function (){
    return view('bauchbinde');
});


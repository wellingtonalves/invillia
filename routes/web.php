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

Route::namespace('App\Http\Controllers')->group(function (){
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('auth', 'LoginController@auth')->name('auth');

    Route::group(['middleware' => ['auth']], function (){
        Route::get('/', function () {
            return view('app');
        });

        Route::post('upload', 'XmlController@upload')->name('upload');


        Route::get('logout', 'LoginController@logout')->name('logout');
    });
});

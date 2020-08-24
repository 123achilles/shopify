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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'admin.'],
    function () {

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/api-keys', 'SettingsController@index')->name('api-keys');
        Route::get('/api-keys/add', 'SettingsController@create')->name('api-keys.create');
        Route::post('/api-keys/add', 'SettingsController@store')->name('api-keys.store');
        Route::get('/api-keys/edit/{id}', 'SettingsController@edit')->name('api-keys.edit');
        Route::put('/api-keys/edit/{id}', 'SettingsController@update')->name('api-keys.update');


    });

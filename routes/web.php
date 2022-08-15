<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScientistController;

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

Route::get('/', 'ScientistController@index')->name('index');
Route::get('/create', 'ScientistController@create')->name('create');
Route::post('store/', 'ScientistController@store')->name('store');
Route::get('show/{scientist}', 'ScientistController@show')->name('show');
Route::get('edit/{scientist}', 'ScientistController@edit')->name('edit');
Route::put('edit/{scientist}', 'ScientistController@update')->name('update');
Route::delete('/{scientist}', 'ScientistController@destroy')->name('destroy');
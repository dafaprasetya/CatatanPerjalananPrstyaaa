<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;

use App\User;

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
})->name('wellcome');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/cari', 'HomeController@cari')->name('cari');
    Route::post('/home','HomeController@upload')->name('ujang');
    Route::resource("/history", HistoryController::class);
});

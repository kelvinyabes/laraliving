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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pertanyaan', 'PertanyaanController@index'); // menampilkan semua
    Route::get('/pertanyaan/create', 'PertanyaanController@create'); // menampilkan halaman form
    Route::post('/pertanyaan', 'PertanyaanController@store'); // menyimpan data
    Route::get('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@show'); // menampilkan detail semua pertanyaan dengan isis
    Route::get('/pertanyaan/{pertanyaan_id}/edit', 'PertanyaanController@edit'); // menampilkan form untuk edit pertanyaan
    Route::put('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@update'); // menyimpan perubahan dari form edit
    Route::delete('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@destroy'); // menghapus data dari id
    Route::post('/jawaban/{pertanyaan_id}', 'JawabanController@store');
    Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index');

    Route::get('/pertanyaan/user/{user_id}', 'PertanyaanController@index2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

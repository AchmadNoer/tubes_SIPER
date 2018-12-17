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

Route::resource('bencana/list', 'BencanaController');
Route::get('bencana/input', 'BencanaController@create');
Route::get('/home', 'AkunController@beranda');

Route::resource('training/list', 'TrainingController');
Route::get('training/input', 'TrainingController@create');

Route::resource('akun/list', 'AkunController');
Route::resource('akun/list/update', 'AkunController@update');
Route::get('/masuk', 'AkunController@login');
Route::post('/loginPost', 'AkunController@loginPost');
Route::get('/daftar', 'AkunController@create');
Route::post('/registerPost', 'AkunController@store');
Route::get('/keluar', 'AkunController@logout');

Route::resource('historib', 'HistoriBController');
Route::get('/bencana/presensi', 'HistoriBController@create');

Route::resource('historit', 'HistoriTController');
Route::get('/training/presensi', 'HistoriTController@create');

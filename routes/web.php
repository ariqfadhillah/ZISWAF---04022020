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

// tampilan home
Route::get('/','PetugasController@index');

// Petugas Featured
	Route::get('/petugas','PetugasController@index');
	Route::get('getdatapetugas',[
	'uses' => 'PetugasController@get',
	'as' => 'ajax.0'
	]);
	Route::post('/petugas/create','PetugasController@create');
	Route::get('/petugas/{petugas}/edit','PetugasController@edit');
	Route::post('/petugas/{petugas}/update','PetugasController@update');
	Route::get('/petugas/{petugas}/delete','PetugasController@delete');

// Master Satuan ZISWAF Featured
	Route::get('/satuan_ziswaf','Satuan_ZiswafController@index');
	Route::get('getdatasatuan',[
	'uses' => 'Satuan_ZiswafController@get',
	'as' => 'ajax.1'
	]);
	Route::post('/satuan_ziswaf/create','Satuan_ZiswafController@create');
	Route::get('/satuan_ziswaf/{satuan_ziswaf}/edit','Satuan_ZiswafController@edit');
	Route::post('/satuan_ziswaf/{satuan_ziswaf}/update','Satuan_ZiswafController@update');
	Route::get('/satuan_ziswaf/{satuan_ziswaf}/delete','Satuan_ZiswafController@delete');

// Master Jenis_ZISWAF Featured
	Route::get('/jenis_ziswaf','Jenis_ZiswafController@index');
	Route::get('getdatajenis',[
	'uses' => 'Jenis_ZiswafController@get',
	'as' => 'ajax.2'
	]);
	Route::post('/jenis_ziswaf/create','Jenis_ZiswafController@create');
	Route::get('/jenis_ziswaf/{jenis_ziswaf}/edit','Jenis_ZiswafController@edit');
	Route::post('/jenis_ziswaf/{jenis_ziswaf}/update','Jenis_ZiswafController@update');
	Route::get('/jenis_ziswaf/{jenis_ziswaf}/delete','Jenis_ZiswafController@delete');

// Muzakki List Featured
	Route::get('/muzakki','MuzakkiController@index');
	Route::get('getdatamuzakki',[
	'uses' => 'MuzakkiController@get',
	'as' => 'ajax.3'
	]);
	Route::post('/muzakki/create','MuzakkiController@create');
	Route::get('/muzakki/{muzakki}/edit','MuzakkiController@edit');
	Route::post('/muzakki/{muzakki}/update','MuzakkiController@update');
	Route::get('/muzakki/{muzakki}/delete','MuzakkiController@delete');

// Amil atau Petugas Validasi ZISWAF Featured
	Route::get('/amil','AmilController@index');
	Route::get('getdataamil',[
	'uses' => 'AmilController@get',
	'as' => 'ajax.4'
	]);
	Route::post('/amil/create','AmilController@create');
	Route::get('/amil/{amil}/edit','AmilController@edit');
	Route::post('/amil/{amil}/update','AmilController@update');
	Route::get('/amil/{amil}/delete','AmilController@delete');

// Rekap Kuitansi ZISWAF Featured
	Route::get('/kuitansi','RekapKuitansiController@index');
	Route::get('getdatakuitansi',[
	'uses' => 'RekapKuitansiController@boom',
	'as' => 'ajax.5'
	]);
	Route::post('/kuitansi/create','RekapKuitansiController@create');
	Route::get('/kuitansi/{kuitansi}/edit','RekapKuitansiController@edit');
	Route::post('/kuitansi/{kuitansi}/update','RekapKuitansiController@update');
	Route::get('/kuitansi/{kuitansi}/delete','RekapKuitansiController@delete');


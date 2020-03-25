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



Route::group([
    'middleware'    => 'auth'],function(){
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('/mail', function () {
            return view('mail');
        });
        Route::get('/datatable', function () {
            return view('datatable');
        });
        Route::get('/group', function () {
            return view('group');
        });
        Route::get('/forum', function () {
            return view('forum');
        });

        Route::get('test-helper', function(){
            return '<h1>' . oon() . '</h1>';
        });

        Route::group(['prefix' => 'siswa'], function(){
            Route::get('/', 'SiswaController@view');
            Route::get('/create', 'SiswaController@create');
            Route::post('/save', 'SiswaController@save');
        });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

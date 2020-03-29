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
        Route::get('/', 'HomeController@index');
        Route::get('/home/{bulan?}/{tahun?}', 'HomeController@index');
        Route::get('/Home/{bulan?}/{tahun?}', 'HomeController@index');

        Route::group(['prefix' => 'pegawai'], function(){
            Route::get('/{notif?}', 'PegawaiController@index');
            Route::get('/report/report', 'PegawaiController@report');
            Route::get('/create', 'SiswaController@create');
            Route::get('/pdf/pegawai', 'PegawaiController@pdf');
            Route::get('/pdf/download', 'PegawaiController@download_pdf');
            Route::post('/save/{act}', 'PegawaiController@store');
            Route::get('/delete/{id}', 'PegawaiController@delete');
        });

        Route::group(['prefix' => 'golongan'], function(){
            Route::get('/{notif?}', 'GolonganController@index');
            Route::get('/pdf/golongan', 'GolonganController@pdf');
            Route::get('/pdf/download', 'GolonganController@download_pdf');
            Route::post('/save/{act}', 'GolonganController@store');
            Route::get('/delete/{id}', 'GolonganController@delete');
        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('/{notif?}', 'UsersController@index');
            Route::get('/pdf/user', 'UsersController@pdf');
            Route::get('/pdf/download', 'UsersController@download_pdf');
            Route::post('/save/{act}', 'UsersController@store');
            Route::get('/delete/{id}', 'UsersController@delete');
        });

        Route::group(['prefix' => 'kegiatan'], function(){
            Route::get('/{notif?}', 'KegiatanController@index');
            Route::get('/pdf/kegiatan', 'KegiatanController@pdf');
            Route::get('/pdf/download', 'KegiatanController@download_pdf');
            Route::post('/save/{act}', 'KegiatanController@store');
            Route::get('/delete/{id}', 'KegiatanController@delete');
        });

        Route::group(['prefix' => 'employe'], function(){
            Route::get('/{notif?}', 'EmployeController@index');
            Route::get('/pdf/kegiatan', 'EmployeController@pdf');
            Route::get('/pdf/download', 'EmployeController@download_pdf');
            Route::post('/save/{act}', 'EmployeController@store');
            Route::get('/delete/{id}', 'EmployeController@delete');
        });

        Route::group(['prefix' => 'domlak'], function(){
            Route::get('/{notif?}', 'DomlakController@index');
            Route::get('/pdf/domlak', 'DomlakController@pdf');
            Route::get('/pdf/download', 'DomlakController@download_pdf');
            Route::post('/save/{act}', 'DomlakController@store');
            Route::get('/delete/{id}', 'DomlakController@delete');
            Route::get('/tujuan/{id}', 'SurattugasController@tujuan');
        });

        Route::group(['prefix' => 'surat_tugas'], function(){
            Route::get('/{notif?}', 'SurattugasController@index');
            Route::get('/report/report', 'SurattugasController@report');
            Route::get('/kwitansi/{notif?}', 'SurattugasController@index_kwitansi');
            Route::get('/pdf/sppd/{id}', 'SurattugasController@pdf_sppd');
            Route::get('/pdf/spt/{id}', 'SurattugasController@pdf_spt');
            Route::get('/pdf/kwitansi/{id}', 'SurattugasController@pdf_kwitansi');
            Route::get('/pdf/surat_tugas', 'SurattugasController@pdf');
            Route::get('/pdf/download', 'SurattugasController@download_pdf');
            Route::post('/save/{act}', 'SurattugasController@store');
            Route::post('/save_detail/', 'SurattugasController@store_detail');
            Route::get('/cari/{id}', 'SurattugasController@cari_jumlah');
            Route::get('/detail/{id}', 'SurattugasController@detail');
            Route::get('/delete/{id}', 'SurattugasController@delete');
            Route::get('/tujuan/{id}', 'SurattugasController@tujuan');
            Route::get('/ceknilai/{z}/{jenis}/{angkutan}/{tujuan}', 'SurattugasController@cek_nilai');
            // Route::get('/ceknilai/{a?}/{b?}/{c?}', 'SurattugasController@cek_nilai');
        });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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


use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
    Route::get('/', function () {
        $_SESSION['btn']=0;
        return view('admin.index');
    })->name('admin');

    Route::group(['prefix'=>'horoscope'], function () {
        Route::get('/', ['uses'=>'Admin\HoroscopeController@index', 'as'=>'adminHoroscope']);
        Route::get('/add', ['uses'=>'Admin\HoroscopeController@create', 'as'=>'horoscopeCreate']);
        Route::post('/add', ['uses'=>'Admin\HoroscopeController@store', 'as'=>'horoscopeStore']);
        Route::delete('/destroy/{id}', ['uses'=>'Admin\HoroscopeController@destroy', 'as'=>'horoscopeDestroy']);
        Route::get('/edit/{id}', ['uses'=>'Admin\HoroscopeController@edit', 'as'=>'horoscopeEdit']);
        Route::put('/update/{id}', ['uses'=>'Admin\HoroscopeController@update', 'as'=>'horoscopeUpdate']);
    });

    Route::group(['prefix'=>'compatibilityHoroscope'], function () {
        Route::get('/', ['uses'=>'Admin\CompatibilityHoroscopeController@index', 'as'=>'adminCompatibilityHoroscope']);
        Route::get('/add', ['uses'=>'Admin\CompatibilityHoroscopeController@create', 'as'=>'compatibilityHoroscopeCreate']);
        Route::post('/add', ['uses'=>'Admin\CompatibilityHoroscopeController@store', 'as'=>'compatibilityHoroscopeStore']);
        Route::delete('/destroy/{id}', ['uses'=>'Admin\CompatibilityHoroscopeController@destroy', 'as'=>'compatibilityHoroscopeDestroy']);
        Route::get('/edit/{id}', ['uses'=>'Admin\CompatibilityHoroscopeController@edit', 'as'=>'compatibilityHoroscopeEdit']);
        Route::put('/update/{id}', ['uses'=>'Admin\CompatibilityHoroscopeController@update', 'as'=>'compatibilityHoroscopeUpdate']);
    });

    Route::group(['prefix'=>'zadiaks'], function () {
        Route::get('/', ['uses'=>'Admin\ZadiakController@index', 'as'=>'adminZadiak']);
        Route::get('/add', ['uses'=>'Admin\ZadiakController@create', 'as'=>'zadiakCreate']);
        Route::post('/add', ['uses'=>'Admin\ZadiakController@store', 'as'=>'zadiakStore']);
        Route::delete('/destroy/{id}', ['uses'=>'Admin\ZadiakController@destroy', 'as'=>'zadiakDestroy']);
        Route::get('/edit/{id}', ['uses'=>'Admin\ZadiakController@edit', 'as'=>'zadiakEdit']);
        Route::put('/update/{id}', ['uses'=>'Admin\ZadiakController@update', 'as'=>'zadiakUpdate']);
    });
});

Route::group(['middleware'=>'web'],function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::post('/', 'IndexController@zadiakByBirhData')->name('indexPost');

    Route::get('/{zadiakName}/{day}/{checkFromIcon?}', 'IndexController@contentShow')->name('horoscope');

    Route::get('/compatibilityHoroscope', function () {
        return view('layouts.page2');
    })->name('compatibilityHoroscope');

    Route::post('/compatibilityHoroscope', 'IndexController@compatibilityHoroscopeShow')->name('compatibilityHoroscopePost');

    Route::get('/home', function () {
        return view("auth.home");
    });
    Route::auth();
});


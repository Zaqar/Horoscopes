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

Route::group(['middleware'=>'web'],function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::post('/', 'IndexController@zadiakByBirhData')->name('indexPost');

    Route::get('/{zadiakName}/{day}/{checkFromIcon?}', 'IndexController@contentShow')->name('horoscope');

    Route::get('/compatibilityHoroscope', function () {
        return view('layouts.page2');
    })->name('compatibilityHoroscope');

    Route::post('/compatibilityHoroscope', 'IndexController@compatibilityHoroscopeShow')->name('compatibilityHoroscopePost');

    Route::auth();
});

Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::group(['prefix'=>'horoscope'], function () {
        Route::get('/', ['uses'=>'Admin/HoroscopeController@execute', 'as'=>'adminHoroscope']);
        Route::match(['get','post'],'/add', ['uses'=>'Admin/HoroscopeAddController@execute', 'as'=>'horoscopeAdd']);
        Route::match(['get','post','delete'],'/edit', ['uses'=>'HoroscopeEditController@execute', 'as'=>'horoscopeEdit']);
    });

    Route::group(['prefix'=>'compatibilityHoroscope'], function () {
        Route::get('/', ['uses'=>'Admin/CompatibilityHoroscopeController@execute', 'as'=>'adminCompatibilityHoroscope']);
        Route::match(['get','post'],'/add', ['uses'=>'Admin/CompatibilityHoroscopeAddController@execute', 'as'=>'compatibilityHoroscopeAdd']);
        Route::match(['get','post','delete'],'/edit', ['uses'=>'CompatibilityHoroscopeEditController@execute', 'as'=>'compatibilityHoroscopeEdit']);
    });
});



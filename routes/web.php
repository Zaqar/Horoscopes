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
        return view('admin.index');
    });

    Route::group(['prefix'=>'horoscope'], function () {
        Route::get('/', ['uses'=>'Admin\HoroscopeController@show', 'as'=>'adminHoroscope']);
        Route::match(['get','post'],'/add', ['uses'=>'Admin\HoroscopeAddController@add', 'as'=>'horoscopeAdd']);
        Route::match(['get','post','delete'],'/edit/{id}', ['uses'=>'Admin\HoroscopeEditController@execute', 'as'=>'horoscopeEdit']);
    });

    Route::group(['prefix'=>'compatibilityHoroscope'], function () {
        Route::get('/', ['uses'=>'Admin\CompatibilityHoroscopeController@show', 'as'=>'adminCompatibilityHoroscope']);
        Route::match(['get','post'],'/add', ['uses'=>'Admin\CompatibilityHoroscopeAddController@add', 'as'=>'compatibilityHoroscopeAdd']);
        Route::match(['get','post','delete'],'/edit/{id}', ['uses'=>'Admin\CompatibilityHoroscopeEditController@execute', 'as'=>'compatibilityHoroscopeEdit']);
    });

    Route::group(['prefix'=>'zadiaks'], function () {
        Route::get('/', ['uses'=>'Admin\ZadiakController@show', 'as'=>'adminZadiak']);
        Route::match(['get','post'],'/add', ['uses'=>'Admin\ZadiakAddController@add', 'as'=>'zadiakAdd']);
        Route::match(['get','post','delete'],'/edit/{id}', ['uses'=>'Admin\ZadiakEditController@execute', 'as'=>'zadiakEdit']);
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


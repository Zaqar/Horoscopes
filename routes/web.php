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


Route::group(['middleware'=>'web'],function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::post('/', 'IndexController@zadiakByBirhData')->name('indexPost');

    Route::get('/{zadiakName}/{day}/{checkFromIcon?}', 'IndexController@contentShow')->name('horoscope');

    Route::get('/compatibilityHoroscope', function () {
        return view('layouts.page2');
    })->name('compatibilityHoroscope');

    Route::post('/compatibilityHoroscope', 'IndexController@compatibilityHoroscopeShow')->name('compatibilityHoroscopePost');
});

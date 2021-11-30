<?php

use Illuminate\Support\Facades\Route;

//user
Route::get('/user', 'Api\LoginController@index');
Route::post('/user/login', 'Api\LoginController@login');
Route::post('/user/register', 'Api\LoginController@register');

//data claiment
Route::post('/data-claiment', 'Api\DataClaimentController@index');
Route::post('/data-claiment/sudah_sppa', 'Api\DataClaimentController@sudah_sppa');
Route::post('/data-claiment/store', 'Api\DataClaimentController@store');
Route::post('/data-claiment/update', 'Api\DataClaimentController@update');
Route::post('/data-claiment/delete', 'Api\DataClaimentController@destroy');


//data sppa 
Route::post('/data-sppa', 'Api\DataSPPAController@index');
Route::post('/data-sppa/show','Api\DataSPPAController@show');
Route::post('/data-sppa/show_penjualan','Api\DataSPPAController@show_penjualan');
Route::post('/data-sppa/store', 'Api\DataSPPAController@store');
Route::post('/data-sppa/store/file', 'Api\DataSPPAController@storeFile');
Route::post('/data-sppa/store/fileTTD', 'Api\DataSPPAController@storeFileTandaTangan');

//generate pdf
Route::get('/data-sppa/print_pdf','Api\DataSPPAController@print_pdf');
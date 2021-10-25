<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//user
Route::get('/user', 'Api\DataUserController@index');
Route::post('/user/store', 'Api\DataUserController@store');

//data claiment
Route::get('/data-claiment', 'Api\DataClaimentController@index');
Route::post('/data-claiment/store', 'Api\DataClaimentController@store');

//data sppa 
Route::post('/data-sppa/store', 'Api\DataSPPAController@store');


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//user
Route::get('/user', 'Api\LoginController@index');
Route::post('/user/login', 'Api\LoginController@login');
Route::post('/user/register', 'Api\LoginController@register');

//data claiment
Route::post('/data-claiment', 'Api\DataClaimentController@index');
Route::post('/data-claiment/store', 'Api\DataClaimentController@store');

//data sppa 
Route::post('/data-sppa/store', 'Api\DataSPPAController@store');


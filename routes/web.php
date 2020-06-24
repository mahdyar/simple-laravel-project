<?php

use Illuminate\Support\Facades\Route;

// Made with <3 by mahdyar.me
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

Route::get('/', 'LikeController@get');

Route::post('/', 'LikeController@store');

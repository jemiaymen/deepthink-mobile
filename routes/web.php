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

use Illuminate\Console\Command;

use Illuminate\Foundation\Inspiring;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/config', function () {


	
	$exitCode = Artisan::call('key:generate');
	$exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
});
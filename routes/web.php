<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    Log::withContext([
        'milliseconds' => floor(microtime(true) * 1000)
    ]);


    Log::channel()->alert('message');
    $channel = Log::build([
        'driver' => 'single',
        'path' => storage_path('storage/logs/build.log'),
        'level' => env('LOG_LEVEL', 'debug'),
      ]);
      Log::stack(['second',$channel])->info('message '. 'date => '. now());

});

Route::get('test', function(){
    Log::channel('second')->critical('message');
});
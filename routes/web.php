<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\getController;
use App\Http\Controllers\postController;
use App\Http\Controllers\weatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hi', function () {
    return('Hi Laravel Web');
});

Route::get('/post', [postController::class, 'post']);
Route::get('/get/{id?}/{name?}', [getController::class, 'get']);

Route::controller(bookController::class) -> group(function(){
    Route::get('/books', 'books');
    Route::get('/books/{id}', 'getBook') -> whereNumber(('id'));  //only recive any number
    Route::get('/books/{id}/{field}', 'getBookField');

    Route::post('/books', 'createBook');
    Route::post('/header', 'getHeader');
    Route::post('/photo', 'getFile');

    Route::get('/ip', 'getIp');
    Route::post('/cookie', 'getCookie');
    Route::post('/respons', 'getRespons');
    //............................................Re Direct System
    Route::get('/redirect1', 'reDirect1');
    Route::get('/redirect2', 'reDirect2');
    //............................................Re Direct System

    Route::get('/binary', 'fileBainary');
    Route::get('download', 'fileDownload');
});
// Route::get('/books',[bookController::class, 'books']);
// Route::get('/books/{id}',[bookController::class, 'getBook']) -> whereNumber(('id'));  //only recive any number
// Route::get('/books/{id}/{field}',[bookController::class, 'getBookField']);

Route::get('/weather/{city?}', [weatherController::class, 'getWeather']);


$table->string('content')->after('description')->nullable();
            $table->dropColumn('description');

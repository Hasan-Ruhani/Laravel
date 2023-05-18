<?php

use Illuminate\Http\Request;
use App\Http\Controllers\bookController;
use App\Http\Controllers\getController;
use App\Http\Controllers\postController;
use App\Http\Controllers\weatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', function(){
    return view('test.test');
});

Route::get('/user/{id?}/{Name?}', function($user='5', $name='Masud'){
    // return 'This user id = '."'".$user."'".'. And his name '."'" .$name."'";
    return view('test.usertest', [
        'userName' => $name,
        'userId'   => $user,
    ]);
});

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
});
// Route::get('/books',[bookController::class, 'books']);
// Route::get('/books/{id}',[bookController::class, 'getBook']) -> whereNumber(('id'));  //only recive any number
// Route::get('/books/{id}/{field}',[bookController::class, 'getBookField']);

Route::get('/weather/{city?}', [weatherController::class, 'getWeather']);
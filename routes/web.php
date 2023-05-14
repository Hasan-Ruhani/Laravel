<?php

use App\Http\Controllers\getController;
use App\Http\Controllers\postController;
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

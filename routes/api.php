<?php

use Illuminate\Http\Request;
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
<?php


use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect()->route('login');
// });


Route::get('/login', [\App\Http\Controllers\LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'authenticate']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class,'logout']);

// Route::get('/dashboard/fetch-api-quotes', [FriendController::class, 'fetchApiQuotes'])->name('attendance.fetchApiQuotes');

Route::get('/register', [\App\Http\Controllers\RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [\App\Http\Controllers\RegisterController::class,'store']);

Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->middleware('auth');

Route::group([
    'middleware'=>[
        "auth"
    ],
    ], function(){
        Route::resource('/dashboard/attendance',\App\Http\Controllers\FriendController::class);
    });

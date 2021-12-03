<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\EventController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
    
// });
Route::group(['prefix'=>'users'], function(){
    Route::post('/register', [UserController::class , 'register'])->name('user.register');
    Route::post('login', [UserController::class, 'login'])->name('user.login');
     Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::group(['prefix'=>'admins'], function(){
    Route::post('/register', [AdminController::class , 'register'])->name('admin.register');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('details-user', [UserController::class, 'details'])->name('user.details');
    Route::get('/posts', [PostController::class , 'index']);
    Route::get('/post/{id}', [PostController::class , 'show']);
    
    //
    Route::post('/event/{id}/editable/me', [EventController::class , 'editable']);
    Route::post('/event/{id}/editable/release', [EventController::class , 'release']);
    Route::get('/event/{id}/editable/maintain', [EventController::class , 'maintain']);
});

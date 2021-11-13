<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\HomeController;
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
//admin
Route::get('/login', [UserController::class , 'login'])->name('login');
Route::post('/login',[UserController::class , 'postLogin'])->name('post_login');
Route::get('/logout', [UserController::class , 'logout'])->name('logout.user');
Route::group(['namespace' => 'Frontend'], function(){
    Route::get('/home', [HomeController::class , 'index'] )->name('home');
    
});



//frontend
Route::get('/', function () {
    return view('welcome');
});


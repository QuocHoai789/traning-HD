<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\AjaxController;
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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('post_login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout.user');
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/post/{id}', [PostController::class, 'view'])->name('post.view')->middleware('viewpost');
    Route::get('/ajax-create-voucher/{id}', [AjaxController::class, 'createVoucher'])->name('voucher.create');
});



//frontend 
Route::get('/', function () {
    return view('welcome');
});

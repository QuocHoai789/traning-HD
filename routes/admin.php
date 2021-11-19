<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AjaxController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

//admin
Route::get('/admin-login', [AdminController::class , 'login'])->name('login_admin');
Route::post('/admin-login',[AdminController::class , 'postLogin'])->name('post_login_admin');
Route::get('admin/logout', [AdminController::class , 'logout'])->name('logout.admin');
Route::group(['namespace' => 'Admin', 'middleware'=>'admin_login'], function(){
    Route::get('/home', [AdminController::class , 'index'] )->name('home_admin');
    Route::get('/site-admin', [AdminController::class , 'siteAdmin'] )->name('site_admin');
    Route::get('/add-category', [CategoryController::class , 'addCategory'] )->name('category.add');
    Route::post('/add-category', [CategoryController::class , 'addPostCategory'] )->name('category.addpost');
    Route::get('/edit-category/{id}', [CategoryController::class , 'editCategory'] )->name('category.edit');
    Route::post('/edit-category/{id}', [CategoryController::class , 'postEditCategory'] )->name('category.postedit');
    Route::get('/list-categories', [CategoryController::class , 'listCategory'])->name('category.list');
    Route::get('/delete-category/{id}', [CategoryController::class , 'deleteCategory'])->name('category.delete');
    Route::get('/search-category', [CategoryController::class , 'searchCategory'] )->name('category.search');
    //post
    Route::get('/add-post', [PostController::class , 'addPost'] )->name('post.add');
    Route::post('/add-post', [PostController::class , 'addNewPost'] )->name('post.addpost');
    Route::get('/list-post', [PostController::class , 'listPost'])->name('post.list');
    Route::get('/edit-post/{id}', [PostController::class , 'editPost'] )->name('post.edit');
    Route::post('/edit-post/{id}', [PostController::class , 'postEditPost'] )->name('post.post.edit');
    Route::get('/search-post', [PostController::class , 'searchPost'] )->name('post.search');

    //ajax admin-ajax AjaxController
    Route::get('/ajax-enable/{id}', [AjaxController::class , 'ajaxEnable'] )->name('ajax_enable');
    Route::get('/ajax-quantily/{id}', [AjaxController::class , 'ajaxQuantily'] )->name('ajax_quantily');


});
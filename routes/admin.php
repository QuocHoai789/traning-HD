<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
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
    Route::get('/site-admin', [AdminController::class , 'site_admin'] )->name('site_admin');
    Route::get('/add-category', [CategoriesController::class , 'add_category'] )->name('category.add');
    Route::post('/add-category', [CategoriesController::class , 'add_post_category'] )->name('category.addpost');
    Route::get('/edit-category/{id}', [CategoriesController::class , 'edit_category'] )->name('category.edit');
    Route::post('/edit-category/{id}', [CategoriesController::class , 'post_edit_category'] )->name('category.postedit');
    Route::get('/list-categories', [CategoriesController::class , 'list_category'])->name('category.list');
    Route::get('/delete-category/{id}', [CategoriesController::class , 'delete_category'])->name('category.delete');
    Route::get('/search-category', [CategoriesController::class , 'search_category'] )->name('category.search');
    //post
    Route::get('/add-post', [PostController::class , 'add_post'] )->name('post.add');
    Route::post('/add-post', [PostController::class , 'add_new_post'] )->name('post.addpost');
    Route::get('/list-post', [PostController::class , 'list_post'])->name('post.list');
    Route::get('/edit-post/{id}', [PostController::class , 'edit_post'] )->name('post.edit');
    Route::post('/edit-post/{id}', [PostController::class , 'post_edit_post'] )->name('post.post.edit');
    Route::get('/search-post', [PostController::class , 'search_post'] )->name('post.search');

    //ajax admin-ajax AjaxController
    Route::get('/ajax-enable/{id}', [AjaxController::class , 'ajax_enable'] )->name('ajax-enable');
    Route::get('/ajax-quantily/{id}', [AjaxController::class , 'ajax_quantily'] )->name('ajax-quantily');


});
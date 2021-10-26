<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[UserController::class,'ferstpage'])->name('ferstpage');

Route::get('create_acount',[UserController::class,'create'])->name('create');

Route::get('send_me',[UserController::class,'contact'])->name('contact');

// insert into table user 
Route::post('create',[UserController::class,'add'])->name('add');

// log in 
Route::post('log in',[UserController::class,'login'])->name('login');

// log out 
Route::get('log out',[UserController::class,'logout'])->name('logout');

// send 
Route::post('send',[UserController::class,'send'])->name('send');

// link verification
Route::get('user/verification/{token}',[UserController::class,'verification'])->name('verification');

// index product 
Route::get('product',[ArticleController::class,'product'])->name('product');

// add article 
Route::post('article/add',[ArticleController::class,'add'])->name('add_article');

// update article 
Route::get('article/update/{id}',[ArticleController::class,'update_s'])->name('update_article');
Route::post('article/pg_update',[ArticleController::class,'pg_update'])->name('agupdate');
Route::post('article/update',[ArticleController::class,'update'])->name('update');

// delete article 
Route::get('article/delete/{id}',[ArticleController::class,'delete'])->name('delete_article');

// serch article 
Route::post('article/serch',[ArticleController::class,'serch'])->name('serch_article');

// bey article 
Route::get('article/bey',[ArticleController::class,'bey'])->name('bey_article');

// search rout 
Route::get('search',[ArticleController::class,'search']);

// google 
Route::get('callback',[UserController::class,'handleProviderCallback'])->name('handleProviderCallback');
Route::get('/google-login', [UserController::class,'redirectToProvider']);

// facbook 
Route::get('facebook/callback',[UserController::class,'handleProviderfbCallback'])->name('handleProviderCallback');
Route::get('/fb-login', [UserController::class,'redirectToProviderfb']);
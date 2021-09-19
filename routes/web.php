<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware' => 'web'], function(){
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/ListUrl', [App\Http\Controllers\UrlController::class, 'index'])->middleware('auth');
Route::get('/NewUrl', [App\Http\Controllers\UrlController::class, 'formNew'])->middleware('auth');
Route::post('/NewUrl/add', [App\Http\Controllers\UrlController::class, 'add'])->middleware('auth');
Route::get('/EditUrl/{id}', [App\Http\Controllers\UrlController::class, 'formEdit'])->middleware('auth');
Route::post('/EditUrl/edit/{id}', [App\Http\Controllers\UrlController::class, 'edit'])->middleware('auth');
Route::get('/DeleteUrl/{id}', [App\Http\Controllers\UrlController::class, 'delete'])->middleware('auth');
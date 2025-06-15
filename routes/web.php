<?php

use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin-login');
});

Route::view('admin-login','admin-login');
Route::post('admin-login',[AdminController::class,'login']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('admin-categories',[AdminController::class,'categories']);
Route::get('admin-logout',[AdminController::class,'logout']);

Route::post('add-category',[AdminController::class,'addCategory']);
Route::get('category/delete/{id}',[AdminController::class,'deleteCategory']);
Route::get('add-quiz',[AdminController::class,'addQuiz']);
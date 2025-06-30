<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'welcome']);
Route::get('/user-show-quiz/{id}/{category}', [UserController::class, 'usershowQuiz']);
Route::view('/user-signup','user-signup');
Route::post('/user-signup',[UserController::class,'userSignup']);
Route::get('/start-quiz/{category}',[UserController::class,'startQuiz']);

Route::get('/admin', function () {
    return view('admin-login');
});
Route::view('admin-login', 'admin-login');
Route::post('admin-login', [AdminController::class, 'login']);
Route::get('dashboard', [AdminController::class, 'dashboard']);
Route::get('admin-categories', [AdminController::class, 'categories']);
Route::get('admin-logout', [AdminController::class, 'logout']);

Route::post('add-category', [AdminController::class, 'addCategory']);
Route::get('category/delete/{id}', [AdminController::class, 'deleteCategory']);
Route::get('add-quiz', [AdminController::class, 'addQuiz']);
Route::post('add-mcq', [AdminController::class, 'addMCQs']);
Route::get('add-mcq', [AdminController::class, 'addMCQs']);
Route::get('/end-quiz', [AdminController::class, 'finish']);

Route::get('/show-mcqs', [AdminController::class, 'showmcqs']);
Route::get('/show-mcqss/{id}', [AdminController::class, 'showmcqs']);
Route::get('/show-quiz/{id}/{category}', [AdminController::class, 'showQuiz']);

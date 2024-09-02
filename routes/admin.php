<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TestCourseController;
use App\Http\Controllers\Admin\TestLevelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for test level or category 

Route::get('/test',[TestLevelController::class , 'index'])->name('test.index');
Route::get('/test/create',[TestLevelController::class , 'create'])->name('test.create');
Route::post('/test/store',[TestLevelController::class , 'store'])->name('test.store');

Route::get('/testcourse',[TestCourseController::class , 'index'])->name('testcourse.index');
Route::get('/testcourse/create',[TestCourseController::class , 'create'])->name('testcourse.create');
Route::post('/testcourse/store',[TestCourseController::class , 'store'])->name('testcourse.store');

Route::get('/testquestion',[QuestionController::class , 'index'])->name('testquestion.index');
Route::get('/testquestion/create',[QuestionController::class , 'create'])->name('testquestion.create');
Route::post('/testquestion/store',[QuestionController::class , 'store'])->name('testquestion.store');

Route::get('/mocktest',[QuestionController::class , 'index'])->name('mocktest.index');






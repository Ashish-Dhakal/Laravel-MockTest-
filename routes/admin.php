<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestCourseController;
use App\Http\Controllers\Admin\TestLevelController;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for test level or category 

Route::get('/testlevel',[TestLevelController::class , 'index'])->name('testlevel.index');
Route::get('/testlevel/create',[TestLevelController::class , 'create'])->name('testlevel.create');
Route::post('/testlevel/store',[TestLevelController::class , 'store'])->name('testlevel.store');

Route::get('/testcourse',[TestCourseController::class , 'index'])->name('testcourse.index');
Route::get('/testcourse/create',[TestCourseController::class , 'create'])->name('testcourse.create');
Route::post('/testcourse/store',[TestCourseController::class , 'store'])->name('testcourse.store');


Route::get('/test',[TestController::class , 'index'])->name('test.index');
Route::post('/test/submit', [TestController::class, 'submit'])->name('test.submit');

// Route::get('/test/submit', [TestController::class, 'submit'])->name('test.submit');

// Route::get('/testcourse/create',[TestCourseController::class , 'create'])->name('testcourse.create');
// Route::post('/testcourse/store',[TestCourseController::class , 'store'])->name('testcourse.store');


Route::get('/question',[QuestionController::class , 'index'])->name('question.index');
Route::get('/question/create',[QuestionController::class , 'create'])->name('question.create');
Route::post('/question/store',[QuestionController::class , 'store'])->name('question.store');







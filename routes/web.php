<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/explore-course', [App\Http\Controllers\ExploreCourseController::class, 'index'])->name('explore-course');



require __DIR__.'/admin.php';
require __DIR__.'/entrance-course.php';
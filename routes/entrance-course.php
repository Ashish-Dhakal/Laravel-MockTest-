<?php

use App\Http\Controllers\EntranceCourse\ScienceController;
use Illuminate\Support\Facades\Route;


Route::get('/plus-2-science', [ScienceController::class,'index'])->name('plus2science');
Route::get('/plus-2-science/subject', [ScienceController::class,'subject'])->name('plus2science.subject');

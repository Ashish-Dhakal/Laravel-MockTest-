<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreCourseController extends Controller
{
    public function index(){
        return view('users.explore-course');
    }
}

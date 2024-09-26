<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('users.dashboard');
    }

    public function profile(){
        return view('users.profile');
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        // $data['questions'] = Question::get();
        $data['questions'] = Question::inRandomOrder()->limit(100)->get();
        return view('tests.test',$data);
    }
}

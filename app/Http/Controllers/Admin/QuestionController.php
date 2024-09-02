<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\TestLevel;
use App\Models\TestCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['testLevels'] = TestLevel::all();
        $data['testCourses'] = TestCourse::all();
        return view('admin.questions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validate = Validator::make($request->all(), [
            'test_levels_id' => 'required',
            'test_courses_id' => 'required',
            'option-1' => 'required',
            'option-2' => 'required',
            'option-3' => 'required',
            'option-4' => 'required',
            'option-5' => 'required',
            'option-6' => 'required',
            'correct_ans' => 'required|max:20',
            'reason' => 'required|max:20',
            'question' => 'required|max:20'
        ]);
    
        $option_collection = [
            'option-1' => $request->input('option-1'),
            'option-2' => $request->input('option-2'),
            'option-3' => $request->input('option-3'),
            'option-4' => $request->input('option-4'),
            'option-5' => $request->input('option-5'),
            'option-6' => $request->input('option-6'),
        ];
    
        if ($validate->passes()) {
            dd('pass');
            $quiz = Question::create([

                'options' => json_encode($option_collection),
                'correct_ans' =>  $request->input('correct_ans'),
                'question' =>  $request->input('question'),
                'reason' =>  $request->input('reason'),
            ]);
        } else {
            // Handle validation failure
            dd('fail',$validate->errors()->all());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

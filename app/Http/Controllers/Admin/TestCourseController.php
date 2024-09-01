<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestLevel;
use App\Models\TestCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['testCourses'] = TestCourse::all();

        return view('admin.test-course.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['testLevels'] = TestLevel::all();
        return view('admin.test-course.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'test_levels_id' => 'required'
        ]);
        // generate the custon slug from the name 
        $slug = str_replace(' ', '-', $request->input('name'));
        $slug = strtolower($slug);
        $request->merge(['slug' => $slug]);
    

        if ($validator->passes()) {
            $test_course = new TestCourse();
            $test_course->name = $request->name;
            $test_course->test_levels_id = $request->test_levels_id;
            $test_course->slug = $request->input('slug');
            $test_course->save();
            return redirect()->route('testcourse.index')->with('success', 'Test Course created successfully');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
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

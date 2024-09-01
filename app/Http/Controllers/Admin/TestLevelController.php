<?php

namespace App\Http\Controllers\Admin;

use App\Models\TestLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['testLevels'] = TestLevel::all();

        return view('admin.test-level.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.test-level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);
        // generate the custon slug from the name 
        $slug = str_replace(' ', '-', $request->input('name'));
        $slug = strtolower($slug);
        $request->merge(['slug' => $slug]);
    

        if ($validator->passes()) {
            $test_level = new TestLevel();
            $test_level->name = $request->name;
            $test_level->description = $request->description;
            $test_level->slug = $request->input('slug');
            $test_level->save();
            return redirect()->route('test.index')->with('success', 'Article created successfully');
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

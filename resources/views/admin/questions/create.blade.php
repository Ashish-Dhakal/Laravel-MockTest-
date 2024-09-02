@extends('adminlte::page')

@section('title', 'Test Level')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Question</li>
        </ol>
    </nav>
@stop

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Course</h3>
                        <div class="card-tools">
                            <a href="{{ route('testquestion.index') }}" class="btn btn-primary">Back
                                <i class="   fas fa-arrow-left"></i> </a>

                            </a>
                        </div>
                    </div>
                    {{-- form to create the test level / category --}}
                    <form action="{{ route('testquestion.store') }}" method="POST">
                        @csrf

                        {{-- display the error message if data is not saved --}}
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        {{-- display the success message if data is saved --}}
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif


                        <div class="card-body">

                            {{-- list all the test level name in a dropdown to select one of them --}}
                            <div class="form-group">
                                <label for="test_levels_id">Test Level</label>
                                <select name="test_levels_id" id="test_levels_id" class="form-control">
                                    <option value=""> Select Level</option>
                                    @foreach ($testLevels as $testLevel)
                                        <option value="{{ $testLevel->id }}">{{ $testLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- list all the test category name in a dropdown to select one of them --}}


                            <div class="form-group">
                                <label for="test_course_id">Test Course</label>
                                <select name="test_course_id" id="test_course_id" class="form-control">
                                    <option value=""> Select Level</option>
                                    @foreach ($testCourses as $testCourse)
                                        <option value="{{ $testCourse->id }}">{{ $testCourse->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Question</label>
                                <input type="text" class="form-control" value="{{ old('question') }}" name="question"
                                    id="exampleFormControlInput1" placeholder="Question">
                                @error('question')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="row pb-3">
                                <div class="col-md-4 col-12 ">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 1</label>
                                        <input type="text" class="form-control" value="{{ old('option-1') }}"
                                            name="option-1" id="exampleFormControlInput1" placeholder="option 1">
                                        @error('option-1')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 2</label>
                                        <input type="text" class="form-control" value="{{ old('option-2') }}"
                                            name="option-2" id="exampleFormControlInput1" placeholder="option 2">
                                        @error('option-2')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 3</label>
                                        <input type="text" class="form-control" value="{{ old('option-3') }}"
                                            name="option-3" id="exampleFormControlInput1" placeholder="option 3">
                                        @error('option-3')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="row pb-3">


                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 4</label>
                                        <input type="text" class="form-control" value="{{ old('option-4') }}"
                                            name="option-4" id="exampleFormControlInput1" placeholder="option 4">
                                        @error('option-4')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 5</label>
                                        <input type="text" class="form-control" value="{{ old('option-5') }}"
                                            name="option-5" id="exampleFormControlInput1" placeholder="option 5">
                                        @error('option-5')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Option 6</label>
                                        <input type="text" class="form-control" value="{{ old('option-6') }}"
                                            name="option-6" id="exampleFormControlInput1" placeholder="option 6">
                                        @error('option-6')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>





                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Select Course</label>
                                <select class="form-control" name="answer" id="">
                                    <option value="">Correct Answer</option>

                                    <option value="option-1">option 1</option>
                                    <option value="option-2">option 2</option>
                                    <option value="option-3">option 3</option>
                                    <option value="option-4">option 4</option>
                                    <option value="option-5">option 5</option>
                                    <option value="option-6">option 6</option>

                                </select>
                                @error('answer')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="reason">Reason</label>
                                <textarea name="reason" class="form-control" id="reason" value="{{ old('reason') }}"
                                    placeholder="Enter Question Reason"></textarea>
                                @error('reason')
                                    <div class=" text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    @endsection


    @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
        <script>
            console.log("Hi, I'm using the Laravel-AdminLTE package!");
        </script>
    @stop

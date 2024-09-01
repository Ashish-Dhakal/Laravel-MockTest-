@extends('adminlte::page')

@section('title', 'Test Level')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Course</li>
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
                            <a href="{{ route('testcourse.index') }}" class="btn btn-primary">Back
                                <i class="   fas fa-arrow-left"></i> </a>
                                
                            </a>
                        </div>
                    </div>
                    {{-- form to create the test level / category --}}
                    <form action="{{ route('testcourse.store') }}" method="POST">
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
                                <label for="name">Test Course Name</label>
                                <input type="text" name="name" class="form-control" id="level_name"
                                    placeholder="Enter Test Level">
                                @error('level_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Test Level / Category Description</label>
                                <textarea name="description" class="form-control" id="description"
                                    placeholder="Enter Test Level / Category Description"></textarea>
                                @error('description')
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

@extends('adminlte::page')

@section('title', 'Test Level')

@section('content_header')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Level | Category</li>
        </ol>
    </nav>
@stop

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Level | Category</h3>
                        <div class="card-tools">
                            <a href="{{ route('testcourse.create') }}" class="btn btn-primary">Add New
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class=" text-center">
                                <tr>
                                    <th>SL</th>
                                    <th>Test Course Name</th>
                                    <th>test level Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testCourses as $testCourse)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testCourse->name }}</td>
                                        <td>{{ $testCourse->testlevel->name}}</td>
                                        <td>{{ $testCourse->slug }}</td>
                                        <td class=" d-flex align-items-center justify-content-around">
                                            <a href="" class="tn btn-sm btn-primary">Edit
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>



















    @stop

    @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
        <script>
            console.log("Hi, I'm using the Laravel-AdminLTE package!");
        </script>
    @stop

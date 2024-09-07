@extends('adminlte::page')

@section('title', 'Test Results')

@section('content_header')
    <h1>Test Results</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Your Results</h3>
                <div class="list-group">
                    @foreach ($results as $result)
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $result['question'] }}</h4>
                            <ul class="list-group">
                                @foreach ($result['options'] as $key => $option)
                                    <li class="list-group-item">
                                        <strong>{{ $key }}:</strong> {{ $option }}
                                    </li>
                                @endforeach
                            </ul>
                            <p><strong>Your Answer:</strong> {{ $result['user_answer'] }}</p>
                            <p><strong>Correct Answer:</strong> {{ $result['correct_answer'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .list-group-item {
            margin-bottom: 20px;
        }
    </style>
@stop

@section('js')
    <script>
        // Any custom JS for the results page
    </script>
@stop

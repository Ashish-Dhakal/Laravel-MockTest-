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
                <p><strong>Total Score:</strong> {{ $score }} out of 100</p>
                <div class="list-group">
                    @foreach ($results as $result)
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $loop->iteration }}.) {{ $result['question'] }}</h4>
                            <ul class="list-group">
                                @foreach ($result['options'] as $key => $option)
                                    <li class="list-group-item 
                                        @if ($key === $result['correct_answer']) bg-success @endif 
                                        @if ($key === $result['user_answer'] && $result['user_answer'] !== $result['correct_answer']) bg-danger @endif">
                                        <strong>{{ $key }}:</strong> {{ $option }}
                                    </li>
                                @endforeach
                            </ul>
                            <p><strong>Your Answer:</strong> 
                                <span class="@if($result['user_answer'] === $result['correct_answer']) text-success @else text-danger @endif">
                                    {{ $result['user_answer'] }}
                                </span>
                            </p>
                            <p><strong>Correct Answer:</strong> <span class="text-success">{{ $result['correct_answer'] }}</span></p>
                            <p><strong>Reason for Correct Answer:</strong> {{ $result['reason'] }}</p>
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
        .bg-success {
            background-color: #28a745 !important;
            color: white !important;
        }
        .bg-danger {
            background-color: #dc3545 !important;
            color: white !important;
        }
    </style>
@stop

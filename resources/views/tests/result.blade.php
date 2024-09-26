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
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
        }

        .list-group-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .list-group-item h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .list-group-item ul {
            list-style-type: none;
            padding-left: 0;
        }

        .list-group-item li {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: white !important;
        }

        .bg-danger {
            background-color: #dc3545 !important;
            color: white !important;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }
    </style>
@stop

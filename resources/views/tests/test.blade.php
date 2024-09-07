@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Test</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Questions and Options (Scrollable Section) -->
            <div class="col-md-8 questions-container">
                @foreach ($questions as $question)
                    <div class="question" data-question="{{ $question->id }}">
                        <h4>{{ $loop->iteration }}: {{ $question->question }}</h4>
                        <label>
                            <input type="radio" name="question{{ $question->id }}" value="A">
                            {{ $question->options['A'] }}
                        </label><br>
                        <label>
                            <input type="radio" name="question{{ $question->id }}" value="B">
                            {{ $question->options['B'] }}
                        </label> <br>
                        <label>
                            <input type="radio" name="question{{ $question->id }}" value="C">
                            {{ $question->options['C'] }}
                        </label><br>
                        <label>
                            <input type="radio" name="question{{ $question->id }}" value="D">
                            {{ $question->options['D'] }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="question-numbers-container">
                <div class="question-numbers">
                    @foreach ($questions as $question)
                        <div class="question-number" id="q{{ $question->id }}">{{ $loop->iteration }}</div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>




@stop

@section('css')
    <style>
        /* Updated container to align question numbers after the question and options */
        .container {
            display: flex;
            justify-content: space-between;
        }

        /* Questions container styling */
        .questions-container {
            max-height: 100vh;
            overflow-y: auto;
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            /* Spacing between questions and number box */
        }

        /* Individual question styling */
        .question {
            margin-bottom: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #007bff;
        }

        .question.active {
            border-left-color: #28a745;
            background-color: #e9f7ef;
        }

        /* Question numbers container with fixed height and grid layout */
        .question-numbers-container {
            position: fixed;
            right: 20px;
            width: 300px;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-height: 80vh;
            overflow-y: auto;
            scroll-behavior: smooth;

        }

        /* Use CSS Grid to display question numbers in rows */
        .question-numbers {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
            gap: 10px;

        }

        /* Styling for each question number */
        .question-number {
            width: 50px;
            height: 50px;
            background-color: #f1f1f1;
            color: #333;
            text-align: center;
            line-height: 50px;
            border: 2px solid #ddd;
            border-radius: 50%;
            font-size: 18px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .question-number:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .question-number.answered {
            background-color: #28a745;
            color: white;
        }

        .option.selected {
            background-color: #28a745;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .question-numbers-container {
                position: relative;
                width: 100%;
                margin-top: 20px;
            }
        }
    </style>
@stop


@section('js')
    <script>
        $(document).ready(function() {
            // Mark question as answered when an option is selected
            $('input[type="radio"]').on('change', function() {
                var questionId = $(this).closest('.question').data('question');
                $('#q' + questionId).css('background-color', 'green'); // Mark as answered
                $('#q' + questionId).css('color', 'white'); // Mark as answered
            });

            // Scroll to the corresponding question when a number is clicked
            $('.question-number').on('click', function() {
                var questionId = $(this).attr('id').replace('q', ''); // Get the question number from id
                var questionElement = $('div[data-question="' + questionId +
                '"]'); // Find the corresponding question

                // Scroll the questions container to the question
                $('.questions-container').animate({
                    scrollTop: $('.questions-container').scrollTop() + questionElement.position()
                        .top - $('.questions-container').position().top
                }, 600); // Smooth scroll
            });
        });
    </script>
@stop
‰

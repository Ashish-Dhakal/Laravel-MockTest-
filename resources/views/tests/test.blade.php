@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Test</h1> --}}
        <!-- Timer and Attempt Counter Bar -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="timer-bar d-flex justify-content-between align-items-center p-3 bg-light border rounded">
                    <div>
                        <button id="start-timer-btn" class="btn btn-primary">Start Timer</button>
                    </div>
                    <div>
                        <span id="timer-display">Time: 00:00</span>
                    </div>
                    <div>
                        <span id="attempt-counter">0/100 Attempted</span>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('content')
    <div class="container">

        <!-- Form to submit the answers -->
        <form id="test-form" action="{{ route('test.submit') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Questions and Options (Scrollable Section) -->
                <div class="col-md-8 questions-container">
                    @foreach ($questions as $question)
                        <div class="question" data-question="{{ $question->id }}">
                            <h4>{{ $loop->iteration }}: {{ $question->question }}</h4>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="A" disabled>
                                {{ $question->options['A'] }}
                            </label><br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="B" disabled>
                                {{ $question->options['B'] }}
                            </label> <br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="C" disabled>
                                {{ $question->options['C'] }}
                            </label><br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="D" disabled>
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

            <!-- Hidden inputs to store correct answers -->
            @foreach ($questions as $question)
                <input type="text" name="correct_answers[{{ $question->id }}]" value="{{ $question->correct_answer }}">
            @endforeach

            <!-- Submit Button -->
            <button type="submit" id="submit-test-btn" class="btn btn-success" style="display:none">Submit Answer</button>
        </form>
    </div>
@stop

@section('css')
    <style>
        /* Preserving all your previous CSS */
        .container {
            display: flex;
            justify-content: space-between;
        }

        .questions-container {
            max-height: 100vh;
            overflow-y: auto;
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

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

        .question-numbers {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
            gap: 10px;
        }

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

        /* New CSS for the timer bar */
        .timer-bar {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            let timerInterval;
            let totalTime = 0;
            let attempted = 0;
            const totalQuestions = {{ count($questions) }};
            let timerStarted = false;
            let timerRunning = false;

            // Update the timer display
            function updateTimerDisplay() {
                let minutes = Math.floor(totalTime / 60);
                let seconds = totalTime % 60;
                $('#timer-display').text(
                    `Time: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
            }

            // Start the timer
            function startTimer() {
                timerInterval = setInterval(function() {
                    totalTime++;
                    updateTimerDisplay();
                }, 1000);
                timerRunning = true;
            }

            // Stop the timer
            function stopTimer() {
                clearInterval(timerInterval);
                timerRunning = false;
            }

            // Toggle between start and stop
            $('#start-timer-btn').on('click', function() {
                if ($(this).text() === 'Start Timer') {
                    $(this).text('Stop Timer');
                    timerStarted = true;
                    startTimer();
                    $('input[type="radio"]').prop('disabled',
                    false); // Enable options after the timer starts
                } else {
                    // Check if there are any unanswered questions
                    if (attempted < totalQuestions) {
                        if (confirm("You haven't answered all questions. Do you want to proceed?")) {
                            $(this).text('Submit Answer');
                            stopTimer();
                            $('input[type="radio"]').prop('disabled', true); // Disable options
                            $('#submit-test-btn').show(); // Show submit button
                            $('#test-form').attr('action',
                            '{{ route('test.submit') }}'); // Set form action to submit
                            $('#test-form').submit(); // Submit the form
                        }
                    } else {
                        $(this).text('Submit Answer');
                        stopTimer();
                        $('input[type="radio"]').prop('disabled', true); // Disable options
                        $('#submit-test-btn').show(); // Show submit button
                        $('#test-form').attr('action',
                        '{{ route('test.submit') }}'); // Set form action to submit
                        $('#test-form').submit(); // Submit the form
                    }
                }
            });

            // Mark question as answered when an option is selected and update attempted counter
            $('input[type="radio"]').on('change', function() {
                let questionId = $(this).closest('.question').data('question');
                if (!$('#q' + questionId).hasClass('answered')) {
                    attempted++;
                    $('#q' + questionId).addClass('answered'); // Mark as answered
                    $('#attempt-counter').text(`${attempted}/${totalQuestions} Attempted`);
                }
            });

            // Scroll to the corresponding question when a number is clicked
            $('.question-number').on('click', function() {
                if (!timerStarted) {
                    alert("Please start the timer before answering questions.");
                    return;
                }

                var questionId = $(this).attr('id').replace('q', '');
                var questionElement = $('div[data-question="' + questionId + '"]');

                // Scroll the questions container to the question
                $('.questions-container').animate({
                    scrollTop: $('.questions-container').scrollTop() + questionElement.position()
                        .top - $('.questions-container').position().top
                }, 600);
            });

            // Handle form submission
            $('#test-form').on('submit', function(e) {
                if (timerRunning) {
                    e.preventDefault();
                    if (confirm(
                        "You are still in the middle of the test. Are you sure you want to submit?")) {
                        $(this).off('submit').submit(); // Submit the form if confirmed
                    }
                }
            });
        });
    </script>
@stop

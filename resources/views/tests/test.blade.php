@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!-- Timer and Attempt Counter Bar -->
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="timer-bar d-flex justify-content-between align-items-center p-3 bg-light border rounded">
                <div>
                    <button id="submit-test-btn" class="btn btn-success">Submit Test</button>
                </div>
                <div>
                    <span id="timer-display">Time: 00:00</span>
                </div>
                <div>
                    <span id="attempt-counter">0/{{ count($questions) }} Attempted</span>
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
                                <input type="radio" name="answers[{{ $question->id }}]" value="A">
                                {{ $question->options['A'] }}
                            </label><br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="B">
                                {{ $question->options['B'] }}
                            </label><br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="C">
                                {{ $question->options['C'] }}
                            </label><br>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="D">
                                {{ $question->options['D'] }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Question numbers -->
                <div class="question-numbers-container">
                    <div class="question-numbers">
                        @foreach ($questions as $question)
                            <div class="question-number" id="q{{ $question->id }}">{{ $loop->iteration }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Hidden Submit Button (Triggered by JavaScript) -->
            <button type="submit" id="hidden-submit-btn" class="btn btn-success" style="display:none">Submit
                Answer</button>
        </form>
    </div>
@stop



{{-- @section('js')
    <script>
        $(document).ready(function() {
            let timerInterval;
            let totalTime = 0;
            let attempted = 0;
            const totalQuestions = {{ count($questions) }};

            // Automatically start the timer when the page loads
            function startTimer() {
                timerInterval = setInterval(function() {
                    totalTime++;
                    updateTimerDisplay();
                }, 1000);
            }

            // Update the timer display
            function updateTimerDisplay() {
                let minutes = Math.floor(totalTime / 60);
                let seconds = totalTime % 60;
                $('#timer-display').text(
                    `Time: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
            }

            // Automatically start the timer on page load
            startTimer();

            // Mark question as answered when an option is selected and update attempted counter
            $('input[type="radio"]').on('change', function() {
                let questionId = $(this).closest('.question').data('question');
                if (!$('#q' + questionId).hasClass('answered')) {
                    attempted++;
                    $('#q' + questionId).addClass('answered'); // Mark as answered
                    $('#attempt-counter').text(`${attempted}/${totalQuestions} Attempted`);
                }
            });

            $('.question-number').on('click', function() {
                var questionId = $(this).attr('id').replace('q', ''); // Get the question number
                var questionElement = $('div[data-question="' + questionId +
                '"]'); // Find the corresponding question

                // Log the question element and input field for debugging
                console.log('Question Element:', questionElement);
                console.log('Input Field:', questionElement.find('input[type="radio"]').first());

                // Scroll to the question
                if (questionElement.length) {
                    $('.questions-container').animate({
                        scrollTop: questionElement.position().top + $('.questions-container')
                            .scrollTop() - $('.questions-container').offset().top
                    }, 600);

                    // Focus on the corresponding question's input field
                    questionElement.find('input[type="radio"]').first().focus();
                }
            });


            // Handle submit button click
            $('#submit-test-btn').on('click', function() {
                // Stop the timer
                clearInterval(timerInterval);

                // Show the hidden submit button and trigger form submission
                $('#hidden-submit-btn').click();
            });

            // Ensure all radio buttons are enabled before submitting the form
            $('#test-form').on('submit', function() {
                $('input[type="radio"]').prop('disabled', false);
            });
        });
    </script>
@stop --}}


@section('js')
<script>
    $(document).ready(function() {
        let timerInterval;
        let totalTime =  0.1 * 60; // Set countdown time (e.g., 20 minutes = 20 * 60 seconds)
        let attempted = 0;
        const totalQuestions = {{ count($questions) }};

        // Automatically start the countdown timer when the page loads
        function startCountdownTimer() {
            timerInterval = setInterval(function() {
                totalTime--;
                updateTimerDisplay();
                
                // If time reaches zero, stop the timer and submit the form
                if (totalTime <= 0) {
                    clearInterval(timerInterval);
                    alert("Time's up! Submitting the test.");
                    $('#hidden-submit-btn').click();
                }
            }, 1000);
        }

        // Update the countdown timer display
        function updateTimerDisplay() {
            let minutes = Math.floor(totalTime / 60);
            let seconds = totalTime % 60;
            $('#timer-display').text(
                `Time: ${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
        }

        // Automatically start the timer on page load
        startCountdownTimer();

        // Mark question as answered when an option is selected and update attempted counter
        $('input[type="radio"]').on('change', function() {
            let questionId = $(this).closest('.question').data('question');
            if (!$('#q' + questionId).hasClass('answered')) {
                attempted++;
                $('#q' + questionId).addClass('answered'); // Mark as answered
                $('#attempt-counter').text(`${attempted}/${totalQuestions} Attempted`);
            }
        });

        $('.question-number').on('click', function() {
            var questionId = $(this).attr('id').replace('q', ''); // Get the question number
            var questionElement = $('div[data-question="' + questionId + '"]'); // Find the corresponding question

            // Scroll to the question
            if (questionElement.length) {
                $('.questions-container').animate({
                    scrollTop: questionElement.position().top + $('.questions-container')
                        .scrollTop() - $('.questions-container').offset().top
                }, 600);

                // Focus on the corresponding question's input field
                questionElement.find('input[type="radio"]').first().focus();
            }
        });

        // Handle submit button click
        $('#submit-test-btn').on('click', function() {
            // Stop the timer
            clearInterval(timerInterval);

            // Show the hidden submit button and trigger form submission
            $('#hidden-submit-btn').click();
        });

        // Ensure all radio buttons are enabled before submitting the form
        $('#test-form').on('submit', function() {
            $('input[type="radio"]').prop('disabled', false);
        });
    });
</script>
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
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .questions-container {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 80vh;
        }

        .question {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .question:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .question h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .question label {
            display: block;
            font-size: 1rem;
            margin-bottom: 10px;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            position: relative;
            padding-left: 30px;
        }

        .question input[type="radio"] {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .question label:hover {
            background-color: #eaf4ff;
        }

        .question input[type="radio"]:checked+label {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .question-numbers-container {
            width: 300px;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .question-number:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transform: translateY(-3px);
        }

        .question-number.answered {
            background-color: #28a745;
            color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .question-numbers-container {
                width: 100%;
                margin-top: 20px;
            }
        }

        /* New CSS for the timer bar */
        .timer-bar {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #timer-display, #attempt-counter {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        #submit-test-btn {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007bff;
            color: white;
        }

        #submit-test-btn:hover {
            background-color: #0056b3;
        }

        /* New CSS for the question numbers */
        .question-number {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f1f1;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 50%;
            font-size: 18px;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 40px;
            height: 40px;
        }

        .question-number:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transform: translateY(-3px);
        }

        .question-number.answered {
            background-color: #28a745;
            color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
@stop

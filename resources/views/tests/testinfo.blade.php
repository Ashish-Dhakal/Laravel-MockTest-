@extends('adminlte::page')

@section('title', 'Test Info')

@section('content_header')
    <h1 class="text-center">Test Information</h1>
@stop

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="img_box">
                                <img src="https://edurev.gumlet.io/cdn_assets/v315/assets/img/test/testIcon2.svg?w=100&dpr=2.0"
                                    class="img-fluid" alt="Test Icon">
                            </div>
                            <h2 class="mt-2" title="Test: The Living World- 1">Test: The Living World- 1</h2>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-4">
                                <div class="fw-bold fs-4">20</div>
                                <div class="text-muted">Questions</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">20 mins</div>
                                <div class="text-muted">Duration</div>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">80</div>
                                <div class="text-muted">Marks</div>
                            </div>
                        </div>

                       

                        <a href="{{route('test.index')}}" class="btn btn-primary btn-lg">Start Test</a>

                        <h4 class="mt-4">General Instructions</h4>
                        <ul class="list-unstyled text-justify">
                            <li><i class="fas fa-check-circle"></i> Questions can be multiple choice or single choice.
                                Answer appropriately.</li>
                            <li><i class="fas fa-clock"></i> Keep an eye on the timer, and finish before time ends.</li>
                            <li><i class="fas fa-exclamation-triangle"></i> Questions may have negative marking; be cautious
                                while answering.</li>
                            <li><i class="fas fa-eye"></i> The ‘Question Palette’ on the right side of the screen shows
                                question status.</li>
                        </ul>

                        <h5 class="mt-4 pb-4">Question Status</h5>
                        <div class="row text-center d-flex justify-content-around">

                            <div class="col-sm-4">
                                <span class="badge bg-white rounded-circle border border-dark"
                                    style="border-width: 2px;">1</span>
                                <p>Not Answered</p>
                            </div>
                            <div class=" col-sm-4">
                                <span class="badge bg-success rounded-circle ">1</span>
                                <p> Answered</p>
                            </div>
                        </div>

                        <h4 class="mt-4">Navigating & Answering a Question</h4>
                        <p>A. The answer will be saved automatically upon clicking on an option.</p>
                        <p>B. To deselect your chosen answer, click on the clear response button.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .img_box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto;
            width: 100px;
            /* Set a fixed width for the image box */
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        h4,
        h5 {
            color: #333;
        }

        .badge {
            font-size: 1.5rem;
        }

        .list-unstyled li {
            margin: 10px 0;
        }

        .list-unstyled i {
            margin-right: 5px;
        }
    </style>
@stop

@section('js')
    <script>
        function StartQuiz() {
            // Your start quiz function
        }
    </script>
@stop

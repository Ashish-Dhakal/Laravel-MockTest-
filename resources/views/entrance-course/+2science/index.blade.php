@extends('adminlte::page')

@section('title', '+2 Science')

@section('content_header')
    {{-- <h1>+2 Science</h1> --}}
@stop

@section('content')
    <div class="container d-flex flex-column align-items-center">

        <div class="text-center mb-4 mt-lg-5 pt-3">
            <h3 class="fs-3 fw-bold">Explore</h3>
            <p class="text-danger">More Subject Related Content </p>
        </div>

        <ul class="nav nav-pills nav-pill-tab mb-3" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link active mx-1 border-0" id="all-course-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-all-course" type="button" role="tab" aria-controls="pills-all-course"
                    aria-selected="true">All Course</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link mx-1 border-0" id="pills-mock-test-practice-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-test-and-practice" type="button" role="tab"
                    aria-controls="pills-test-and-practice" aria-selected="false">Mock Test & Practice</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link mx-1 border-0" id="pills-revision-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-revision" type="button" role="tab" aria-controls="pills-revision"
                    aria-selected="false">Revision</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link mx-1 border-0" id="pills-refrence-book-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-refrence-book" type="button" role="tab" aria-controls="pills-refrence-book"
                    aria-selected="false">Refrence Book</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link mx-1 border-0" id="pills-refrence-video-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-refrence-video" type="button" role="tab"
                    aria-controls="pills-refrence-video" aria-selected="false">Refrence Video</button>
            </li>

        </ul>



        <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all-course" role="tabpanel" aria-labelledby="all-course-tab"
                tabindex="0">
                <div class="column mt-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="{{route('plus2science.subject')}}" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Physic</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Chemistry</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Biology</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Mathematics</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">English</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-test-and-practice" role="tabpanel"
                aria-labelledby="pills-mock-test-practice-tab" tabindex="0">
                <div class="column mt-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Daily Test For Science Preperation</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Science Mock Test 2025</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm ">
                            <a href="" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                        class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                                    <div class="flex-grow-1  px-3">Topic Wise Mcq for Science Stream</div>
                                    <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                        class="img-fluid" style="max-height: 25px;" alt="Chevron">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-revision" role="tabpanel" aria-labelledby="pills-revision-tab"
                tabindex="0">three
            </div>

            <div class="tab-pane fade" id="pills-refrence-book" role="tabpanel"
                aria-labelledby="pills-refrence-book-tab" tabindex="0">refrence book
            </div>

            <div class="tab-pane fade" id="pills-refrence-video" role="tabpanel"
                aria-labelledby="pills-refrence-video-tab" tabindex="0">refrence video
            </div>
        </div>



        <div class="text-center mt-4">
            <h3 class="fs-3 fw-bold">Explore</h3>
            <p class="text-danger">Give Full Syllabus Science Test </p>
        </div>
        <div class="row mt-4  w-75">
            <div class="col-md-12 ">
                <div class="card shadow-sm ">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="d-flex align-items-center p-3">
                            <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                class="img-fluid me-3" style="max-height: 50px;" alt="+2 Science">
                            <div class="flex-grow-1  px-3">+2 Science Test</div>
                            <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                class="img-fluid" style="max-height: 25px;" alt="Chevron">
                        </div>
                    </a>
                </div>
            </div>
        </div>



        <div class="text-center mb-4 mt-lg-5">
            <h3 class="fs-3 fw-bold">Explore</h3>
            <p class="text-danger">More Subject Related Content </p>
        </div>


        <div class="container py-4">
            <div class="text-center mb-4">
                <h2>Explore videos, notes and tests for Free</h2>
            </div>

            <div class="d-flex justify-content-around flex-wrap explore-wrapper">
                <!-- Card 1: Video Lectures -->
                <div class="card explore-card ">
                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/video.png" alt="Video Lectures">
                    <div class="card-number">850+</div>
                    <div class="card-title">Video Lectures</div>
                    <a href="/course/videos/33/NEET" target="_blank" class="btn btn-primary text-white">View All
                        Videos</a>
                </div>

                <!-- Card 2: Revision Notes -->
                <div class="card explore-card">
                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/essay.png" alt="Revision Notes">
                    <div class="card-number">2500+</div>
                    <div class="card-title">Revision Notes</div>
                    <a href="/course/docs/33/NEET" target="_blank" class="btn btn-primary text-white">View All Docs</a>
                </div>

                <!-- Card 3: Online Tests -->
                <div class="card explore-card">
                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/exam.png" alt="Online Tests">
                    <div class="card-number">600+</div>
                    <div class="card-title">Online Tests</div>
                    <a href="/course/test/33/NEET" target="_blank" class="btn btn-primary text-white">View All Tests</a>
                </div>

                <!-- Card 4: Doubts Solved -->
                <div class="card explore-card">
                    <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/qa.png" alt="Doubts Solved">
                    <div class="card-number">10,000+</div>
                    <div class="card-title">Doubts Solved</div>
                    <a href="/course/questions/33/NEET" target="_blank" class="btn btn-primary text-white">View All
                        Questions</a>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <style>
        /* Tab Buttons Styling */
        .nav-pill-tab .nav-link {
            color: #495057;
            font-weight: 500;
            border-radius: 30px;
            background-color: #e9ecef;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .nav-pill-tab .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .nav-pill-tab .nav-link:hover {
            /* background-color: #0056b3; */
            color: white;
            transform: scale(1.05);
        }

        /* Card Container Styling */
        .column {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            width: auto;
        }

        /* Individual Card Styling */
        .card {
            transition: box-shadow 0.3s, transform 0.3s;
            border: none;
            border-radius: 10px;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        /* Card Content Styling */
        .card img {
            max-height: 60px;
            border-radius: 5px;
            object-fit: contain;
        }

        .card .d-flex {
            justify-content: space-between;
            align-items: center;
        }

        .card .flex-grow-1 {
            font-size: 18px;
            font-weight: 500;
            color: #495057;
        }

        .card a {
            color: inherit;
            text-decoration: none;
        }

        /* Spacing for better readability */
        .card .p-3 {
            padding: 15px;
        }

        /* Chevron Styling */
        .card img:last-child {
            max-height: 20px;
            opacity: 0.7;
        }

        /* Responsive for Smaller Screens */
        @media (max-width: 768px) {
            .column {
                flex-direction: column;
            }

            .nav-pill-tab .nav-link {
                padding: 8px 16px;
                font-size: 14px;
            }

            .card .flex-grow-1 {
                font-size: 16px;
            }
        }


        .explore-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 22%;
            height: 300px;
            /* Fixed card height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .explore-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .explore-card img {
            width: 80px;
            margin: 0 auto 10px auto;
            /* Image centered with margin auto */
        }

        .explore-card .card-number {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }

        .explore-card .card-title {
            font-size: 1.2rem;
            color: #333;
        }

        .explore-wrapper {
            gap: 10px;
            /* Reduce space between cards */
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .explore-card {
                width: 30%;
            }
        }

        @media (max-width: 992px) {
            .explore-card {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .explore-card {
                width: 100%;
            }
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop

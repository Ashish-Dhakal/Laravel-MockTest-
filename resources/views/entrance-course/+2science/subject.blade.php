@extends('adminlte::page')

@section('title', 'Chemistry')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="ed_innerBox crshdrdv mb-4" style="background: transparent; color: black;">
            <div class="container crs_info_cntnr_parent">
                <div class="crs_hdr w-100">
                    <div class="row align-items-center">
                        <div class="col-sm-1 crs_img_cntnr">
                            <!-- Reduced image size -->
                            <img class="img-fluid rounded" alt="Biology Class 11"
                                src="https://edurev.gumlet.io/AllImages/original/ApplicationImages/CourseImages/f0e26ba5-f12c-483a-a8d8-c3b1a9dcc85e_CI.jpg?w=128&amp;dpr=2.0"
                                width="80px" loading="lazy">
                        </div>
                        <!-- Chapter name displayed next to image -->
                        <div class="col-sm-11">
                            <h3 class="mb-0">Biology Class 11</h3>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>


        @foreach ([['Human Cell', 18, 5, 10, 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubopen_v2.png', 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubclose_v2.png'], ['Plant Cell', 20, 4, 8, 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubopen_v2.png', 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubclose_v2.png'], ['Microorganisms', 15, 3, 12, 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubopen_v2.png', 'https://edurev.gumlet.io/cdn_assets/v313/assets/img/course/coursubclose_v2.png']] as $chapter)
            <div class="subject-box mb-3">
                <div class="chapter-header collapsed" data-bs-toggle="collapse"
                    data-bs-target="#chapterContent{{ $loop->index }}" aria-expanded="false"
                    aria-controls="chapterContent{{ $loop->index }}">
                    <span class="chapter-title">{{ $loop->iteration }}. {{ $chapter[0] }}</span>
                    <span class="chapter-count">
                        Docs ({{ $chapter[1] }}) | Videos ({{ $chapter[2] }}) | Tests ({{ $chapter[3] }})
                    </span>
                    <img src="{{ $chapter[4] }}" class="arrow-icon open-icon" alt="Open">
                    <img src="{{ $chapter[5] }}" class="arrow-icon close-icon" alt="Close">
                </div>

                <div id="chapterContent{{ $loop->index }}" class="collapse">
                    <ul class="nav nav-tabs mt-3" id="subjectTab{{ $loop->index }}" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active mr-2" id="docs-tab{{ $loop->index }}" data-bs-toggle="tab"
                                data-bs-target="#docs{{ $loop->index }}" type="button" role="tab"
                                aria-controls="docs{{ $loop->index }}" aria-selected="false">
                                Docs ({{ $chapter[1] }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link mr-2" id="videos-tab{{ $loop->index }}" data-bs-toggle="tab"
                                data-bs-target="#videos{{ $loop->index }}" type="button" role="tab"
                                aria-controls="videos{{ $loop->index }}" aria-selected="true">
                                Videos ({{ $chapter[2] }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tests-tab{{ $loop->index }}" data-bs-toggle="tab"
                                data-bs-target="#tests{{ $loop->index }}" type="button" role="tab"
                                aria-controls="tests{{ $loop->index }}" aria-selected="false">
                                Tests ({{ $chapter[3] }})
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3" id="subjectTabContent{{ $loop->index }}">
                        <!-- Videos Tab -->
                        <div class="tab-pane fade" id="videos{{ $loop->index }}" role="tabpanel"
                            aria-labelledby="videos-tab{{ $loop->index }}">
                            <ul class="list-group">
                                @foreach ([['https://via.placeholder.com/50', 'Introduction to Taxonomy (6:19 min)'], ['https://via.placeholder.com/50', 'Diversity in the Living World (3:54 min)']] as $video)
                                    <li class="list-group-item">
                                        <img src="{{ $video[0] }}" alt="Video Thumbnail">
                                        {{ $video[1] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Docs Tab -->
                        <div class="tab-pane fade show active" id="docs{{ $loop->index }}" role="tabpanel"
                            aria-labelledby="docs-tab{{ $loop->index }}">
                            <ul class="list-group">
                                @foreach ([['https://via.placeholder.com/50', 'Mindmap: The Living World (1 page)'], ['https://via.placeholder.com/50', 'Flashcards: The Living World']] as $doc)
                                    <li class="list-group-item">
                                        <img src="{{ $doc[0] }}" alt="Doc Thumbnail">
                                        {{ $doc[1] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tests Tab -->
                        <div class="tab-pane fade" id="tests{{ $loop->index }}" role="tabpanel"
                            aria-labelledby="tests-tab{{ $loop->index }}">
                            <ul class="list-group">
                                @foreach ([['https://via.placeholder.com/50', 'Test: The Living World- 1 (20 questions | 20 min)'], ['https://via.placeholder.com/50', 'Test: Diversity in the Living World (15 questions | 15 min)']] as $test)
                                    <li class="list-group-item">
                                        <img src="{{ $test[0] }}" alt="Test Thumbnail">
                                        {{ $test[1] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach





    </div>
@stop

@section('css')
    <style>
        /* Container styling */
        .container {
            max-width: auto;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }


        /* Image and course title styling */
        .crs_img_cntnr img {
            border-radius: 10px;
            width: 80px;
        }

        h3 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
        }

        /* Chapter Header Styling */
        .chapter-header {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            /* background-color: #e9ecef; */
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .chapter-header:hover {
            background-color: #d8e2eb;
        }

        .chapter-count {
            font-size: 0.9rem;
            color: #555;
        }

        .arrow-icon {
            width: 20px;
            height: 20px;
        }

        .collapsed .open-icon {
            display: none;
        }

        .collapsed .close-icon {
            display: block;
        }

        .open .open-icon {
            display: block;
        }

        .open .close-icon {
            display: none;
        }

        /* Nav Tabs Styling */
        .nav-tabs {
            border-bottom: none;
            justify-content: center;
            margin-top: 20px;
        }

        .nav-tabs .nav-link {
            border-radius: 20px;
            padding: 10px 25px;
            background-color: #e9ecef;
            border: 1px solid #ccc;
            margin-right: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #007bff;
            color: white;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Tab content styling */
        .tab-content {
            margin-top: 20px;
        }

        /* List item styling with image on left */
        .list-group-item {
            display: flex;
            align-items: center;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .list-group-item img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .list-group-item:hover {
            background-color: #f1f3f5;
            transform: scale(1.02);
        }
    </style>
@stop

@section('js')
    <script>
        document.querySelectorAll('.chapter-header').forEach(function(header) {
            header.addEventListener('click', function() {
                const parent = this;
                parent.classList.toggle('open');
            });
        });
    </script>
@stop

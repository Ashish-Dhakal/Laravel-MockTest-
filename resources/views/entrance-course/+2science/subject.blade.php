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
                            <img class="img-fluid rounded" alt="Biology Class 11"
                                src="https://edurev.gumlet.io/AllImages/original/ApplicationImages/CourseImages/f0e26ba5-f12c-483a-a8d8-c3b1a9dcc85e_CI.jpg?w=128&amp;dpr=2.0"
                                width="80px" loading="lazy">
                        </div>
                        <div class="col-sm-11">
                            <h3 class="mb-0">Biology Class 11</h3>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <!-- Loop for each chapter -->
        @foreach ([['Human Cell', 18, 5, 10], ['Plant Cell', 20, 4, 8], ['Microorganisms', 15, 3, 12]] as $chapter)
            <div class="subject-box mb-3 col-md-9">
                <div class="chapter-header" data-bs-toggle="modal" data-bs-target="#chapterModal{{ $loop->index }}">
                    <span class="chapter-title">{{ $loop->iteration }}. {{ $chapter[0] }}</span>
                    <span class="chapter-count">
                        Docs ({{ $chapter[1] }}) | Videos ({{ $chapter[2] }}) | Tests ({{ $chapter[3] }})
                    </span>
                    <img src="{{ asset('assets/icon-image/chevron-forward-outline.svg') }}" alt="Toggle Dropdown" style="width: 24px; height: 24px;">
                </div>
            </div>



            <!-- Modal for each chapter -->
            <div class="modal fade" id="chapterModal{{ $loop->index }}" tabindex="-1"
                aria-labelledby="chapterModalLabel{{ $loop->index }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable"
                    style="padding-left: 100px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="chapterModalLabel{{ $loop->index }}">{{ $chapter[0] }} Details
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-light">
                            <ul class="nav nav-tabs border-0" id="chapterTab{{ $loop->index }}" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active rounded-pill" id="docs-tab{{ $loop->index }}"
                                        data-bs-toggle="tab" data-bs-target="#docs{{ $loop->index }}" type="button"
                                        role="tab" aria-controls="docs{{ $loop->index }}" aria-selected="true">
                                        Docs ({{ $chapter[1] }})
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link rounded-pill" id="videos-tab{{ $loop->index }}"
                                        data-bs-toggle="tab" data-bs-target="#videos{{ $loop->index }}" type="button"
                                        role="tab" aria-controls="videos{{ $loop->index }}" aria-selected="false">
                                        Videos ({{ $chapter[2] }})
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link rounded-pill" id="tests-tab{{ $loop->index }}"
                                        data-bs-toggle="tab" data-bs-target="#tests{{ $loop->index }}" type="button"
                                        role="tab" aria-controls="tests{{ $loop->index }}" aria-selected="false">
                                        Tests ({{ $chapter[3] }})
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content mt-3" id="chapterTabContent{{ $loop->index }}">
                                <!-- Docs Tab Content -->
                                <div class="tab-pane fade show active" id="docs{{ $loop->index }}" role="tabpanel"
                                    aria-labelledby="docs-tab{{ $loop->index }}">

                                    <ul class="list-group">
                                        @foreach ([['https://via.placeholder.com/50', 'Mindmap: The Living World (1 page)'], ['https://via.placeholder.com/50', 'Flashcards: The Living World']] as $doc)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <img src="{{ $doc[0] }}" alt="Doc Thumbnail" class="me-2 mr-1">
                                                    {{ $doc[1] }}
                                                </div>
                                                <div>
                                                    <img src="{{ asset('assets/icon-image/chevron-forward-outline.svg') }}" alt="Toggle Dropdown" style="width: 24px; height: 24px;">

                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Videos Tab Content -->
                                <div class="tab-pane fade" id="videos{{ $loop->index }}" role="tabpanel"
                                    aria-labelledby="videos-tab{{ $loop->index }}">
                                    <ul class="list-group">
                                        @foreach ([['https://via.placeholder.com/50', 'Introduction to Taxonomy (6:19 min)'], ['https://via.placeholder.com/50', 'Diversity in the Living World (3:54 min)']] as $video)
                                            <li class="list-group-item d-flex justify-content-between  align-items-center">
                                                <div>
                                                    <img src="{{ $video[0] }}" alt="Video Thumbnail" class="me-2">
                                                    {{ $video[1] }}
                                                </div>
                                                <div>
                                                    <img src="{{ asset('assets/icon-image/chevron-forward-outline.svg') }}" alt="Toggle Dropdown" style="width: 24px; height: 24px;">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Tests Tab Content -->
                                <div class="tab-pane fade" id="tests{{ $loop->index }}" role="tabpanel"
                                    aria-labelledby="tests-tab{{ $loop->index }}">
                                    <ul class="list-group">
                                        @foreach ([['https://via.placeholder.com/50', 'Test: The Living World- 1 (20 questions | 20 min)'], ['https://via.placeholder.com/50', 'Test: Diversity in the Living World (15 questions | 15 min)']] as $test)
                                            <li class="list-group-item d-flex justify-content-between  align-items-center">
                                                <div>
                                                    <img src="{{ $test[0] }}" alt="Test Thumbnail" class="me-2">
                                                    {{ $test[1] }}
                                                </div>
                                                  <div>
                                                    <img src="{{ asset('assets/icon-image/chevron-forward-outline.svg') }}" alt="Toggle Dropdown" style="width: 24px; height: 24px;">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop


@section('css')
    <style>
        .container {
            padding: 20px;
        }

        /* Chapter Header */
        .chapter-header {
            cursor: pointer;
            padding: 20px;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            background-color: #ffffff;
            color: #333;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .chapter-header:hover {
            /* background-color: #e9ecef; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .chapter-title {
            font-size: 1.2rem;
        }

        .chapter-count {
            font-size: 0.9rem;
            color: #666;
        }

        .dropdown-icon {
            width: 24px;
            height: 24px;
            transition: transform 0.3s ease;
        }

        .dropdown-icon.open {
            transform: rotate(180deg);
        }

        /* Nav Tabs */
        .nav-tabs .nav-link {
            font-weight: 600;
            color: #007bff;
            border-radius: 20px;
            margin: 0 5px;
            border: 1px solid transparent;
            border-bottom: 0px;
        }

        .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: #007bff;
            border-color: #007bff;
        }

        /* List Group Items */
        .list-group-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 10px;
            background-color: #ffffff;
            margin-top: 20px;
        }

        .list-group-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .list-group-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Modal */
        .modal-content {
            border-radius: 15px;
            border: 1px solid #e0e0e0;
        }

        .modal-header,
        .modal-footer {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
        }

        .modal-body {
            padding: 20px;
        }
    </style>
@stop

@section('js')
    <script>
        document.querySelectorAll('.chapter-header').forEach(function(chapterHeader) {
            chapterHeader.addEventListener('click', function() {
                const openIcon = this.querySelector('.open-icon');
                const closeIcon = this.querySelector('.close-icon');
                const isOpen = openIcon.style.display === 'none';

                if (isOpen) {
                    openIcon.style.display = 'block';
                    closeIcon.style.display = 'none';
                } else {
                    openIcon.style.display = 'none';
                    closeIcon.style.display = 'block';
                }
            });
        });
    </script>
@stop

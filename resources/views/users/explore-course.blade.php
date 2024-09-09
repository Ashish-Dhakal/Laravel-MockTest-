@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container d-flex flex-column align-items-center py-5">
        <div class="text-center mb-4">
            <h1 class="fs-3 fw-bold">Explore</h1>
            <p class="text-muted">More Courses in a Single Platform</p>
        </div>

        <div class="mainoptionsBox mt-lg-4 ">
            <table class="table-hover">
                <tbody>
                    <tr data-href="">
                        <td style="width: 75px;">
                            <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                loading="lazy">
                        </td>
                        <td style="text-align: left; padding-left: 20px;">
                            <span style="font-weight: 600; font-size: 16px;">Class 1 to Class 12</span>
                        </td>
                        <td style="width: 50px;">
                            <img
                                src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0">
                        </td>
                    </tr>
                    <tr data-href="link2.html">
                        <td style="width: 75px;">
                            <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                loading="lazy">
                        </td>
                        <td style="text-align: left; padding-left: 20px;">
                            <span style="font-weight: 600; font-size: 16px;">10+ Two</span>
                        </td>
                        <td style="width: 50px;">
                            <img
                                src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0">
                        </td>
                    </tr>
                    <tr data-href="link3.html">
                        <td style="width: 75px;">
                            <img src="https://edurev.gumlet.io/cdn_lib/v10/lib/img/explore/explr_clss.png?w=100&amp;dpr=2.0"
                                loading="lazy">
                        </td>
                        <td style="text-align: left; padding-left: 20px;">
                            <span style="font-weight: 600; font-size: 16px;">Bachelor</span>
                        </td>
                        <td style="width: 50px;">
                            <img
                                src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="text-center">
            <h4 class=" mt-5">Explore Popular Entrance Exam </h4>
            {{-- <p class="text-muted">More Competitive Exam in a Single Platform</p> --}}
        </div>


        <div class="row mt-4">
            @foreach ([
            ['+2 (Science)', '/explore/45/CA-Foundation', 'https://exam.neb.gov.np/assets/img/icons/neb_logo.jpg'],
            ['+2 (Management)', '/explore/70/GRE', 'https://exam.neb.gov.np/assets/img/icons/neb_logo.jpg'],
            ['Bachelor (CMAT)', '/explore/33/NEET', 'https://media.getmyuni.com/assets/images/articles/articles-883e0ec1e979063315b4586b82814914.webp'],
            ['Bachelor (IOE)', '/explore/32/JEE', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJ2AT7cgxzifwKAxf0EipQhXscQ3NP8WUG2w&s'],
            ['Bachelor (MOE)', '/explore/42/GMAT', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1CT1lcInE-zPaBV6mqTIX1-EIDenU99Ifmg&s'],
            ['Law', '/explore/48/UPSC', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiUQ6Yg_rNaGmKW-94BgrTEPYMgVx6x5TP5Q&s'],
            ['Loksewa', '/explore/48/UPSC', 'https://upload.wikimedia.org/wikipedia/en/c/c8/PSC_logo_Nepal.png'],
        ] as $item)
                <div class="col-md-6">
                    <div class="card shadow-sm ">
                        <a href="{{ $item[1] }}" class="text-decoration-none text-dark">
                            <div class="d-flex align-items-center p-3">
                                <img src="{{ $item[2] }}" class="img-fluid me-3" style="max-height: 50px;"
                                    alt="{{ $item[0] }}">
                                <div class="flex-grow-1 px-3">{{ $item[0] }}</div>
                                <img src="https://edurev.gumlet.io/cdn_assets/v313/assets/img/chevron-left.svg?w=50&amp;dpr=2.0"
                                    class="img-fluid" style="max-height: 25px;" alt="Chevron">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>



    </div>



@stop

@section('css')
    <style>
        .container {
            font-family: Arial, sans-serif;
        }

        .mainoptionsBox {
            width: 50%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .table-hover tr {
            cursor: pointer;
        }

        td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
        }

        img {
            max-height: 50px;
        }

        .clear1 {
            color: red;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table-hover td {
            border-bottom: 1px solid #ddd;
        }

        .table-hover td:last-child {
            border-bottom: none;
        }

        .card {
            border-radius: 8px;
            overflow: hidden;
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card img {
            max-height: 50px;
        }
    </style>
@stop

@section('js')
    <script>
        document.querySelectorAll('.table-hover tr').forEach(row => {
            row.addEventListener('click', function() {
                window.location.href = this.getAttribute('data-href');
            });
        });
    </script>
@stop

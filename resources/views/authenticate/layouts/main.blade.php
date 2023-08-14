<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Data Student</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    {{-- bootstraps link --}}
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/dist/css/dashboard.css" rel="stylesheet">

    {{-- font awesome icon --}}
    <link rel="stylesheet" href="{{ asset('/') }}assets/plugin/css/all.min.css">
</head>

<body>


    {{-- header --}}
    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">

            <!-- main -->
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-3 ">
                        @yield('content')

                    </div>
                </div>
            </main>
        </div>
    </div>
    {{-- js link --}}
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}assets/dist/js/dashboard.js"></script>
    <script src="{{ asset('/') }}assets/plugin/js/all.min.js"></script>

</body>

</html>

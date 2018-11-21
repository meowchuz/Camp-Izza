<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Camp Izza | Summer Day Camp | Irvine, CA</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/argon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard.css') }}">
    @yield('stylesheets')
    
</head>
<body>
    @php
        $userRole = Auth::user()->roles[0]->name;
    @endphp

    @if ('owner' == $userRole)
        @include('partials.sidebar.owner')
    @elseif ('counselor' == $userRole)
        @include('partials.sidebar.counselor')
    @elseif ('parent' == $userRole)
        @include('partials.sidebar.parent')
    @endif
    
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        @include('partials.topbar')

        <!-- Header -->
        @yield('header')

        <!-- Content -->
        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; {{ date('Y') }} <a href="http://www.campizza.com" class="text-dark font-weight-bold ml-1" target="_blank">Camp Izza</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/argon.js') }}"></script>
    @yield('scripts')
</body>
</html>
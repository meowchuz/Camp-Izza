<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Camp Izza | Summer Day Camp | Irvine, CA</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
</head>
<body>
    <div class="auth">
        <div class="row h-100">
            <div class="col-lg-6 p-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-lg-5 px-4">
                    <a class="navbar-brand" href="{{ url('http://www.campizza.com') }}">
                        <img src="{{ asset('img/favicon.jpg') }}" height="96" alt="Camp Izza">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.campizza.com">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.campizza.com/camp-fees">Fees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.campizza.com/calendar">Activies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.campizza.com/contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="auth-form">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="auth-navigation">
                    <div class="auth-navigation__blur shadow">
                        <div class="container">
                            @yield('navigation')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>
</html>
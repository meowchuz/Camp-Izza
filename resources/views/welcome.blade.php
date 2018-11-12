<!DOCTYPE html>
<html>

<head>
    <title>Camp Izza | Summer Day Camp | Irvine, CA</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <!-- Css file -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
    
    <style>
        html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
</head>

<body>
    <div class="container">
    <div class="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-lg-5 px-4">
            <a class="navbar-brand" href="{{ url('/login') }}">
                <img src="{{ asset ('images/favicon.gif') }}" height="96" alt="Camp Izza">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        </div>
    </div>



    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


    @yield('scripts')
</body>

</html>
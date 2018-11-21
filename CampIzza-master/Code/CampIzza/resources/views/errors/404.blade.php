<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Page not found | Camp Izza</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors/404.css') }}">
</head>
<body>
    @include('partials.navbar')

    <main class="error-404">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="error-404__container">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="error-404__title">404</h1>
                                <p class="error-404__description">
                                    This is not the web page you are looking for.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
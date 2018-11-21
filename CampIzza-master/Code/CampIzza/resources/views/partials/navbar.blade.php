<nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ gravatar(Auth::user()->email) }}" class="navbar__brand" alt="Camp Izza">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.campizza.com/">Home</a>
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
    </div>
</nav>

<nav class="header">
    <div id="rc_logo">
        <a href="#home" title="Logo">
            <img src="{{ URL::asset('images/favicon.gif') }}" alt="CampIzza" height="56">
        </a> <!-- Swap this placeholder out for your logo image -->
    </div>  

    <div class="rc_nav" id="centered_nav">
        <a href="http://www.campizza.com/" title="Home">Home</a>
        <a href="http://www.campizza.com/camp-fees" title="Fees">Fees</a>
        <a href="http://www.campizza.com/calendar" title="Activities">Activities</a>
        <a href="http://www.campizza.com/contact" title="Contact">Contact</a>
        <a href="javascript:void(0);" title="Menu" style="font-size:18px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <div class="rc_nav_right">
        <a href="{{ url('/logout') }}" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
    </div>
</nav>
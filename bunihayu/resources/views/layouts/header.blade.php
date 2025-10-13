@php
    date_default_timezone_set('Asia/Jakarta'); // Set your desired timezone

    $hour = date('G'); // 'G' returns the hour in 24-hour format (0-23) without leading zeros

    if ($hour >= 5 && $hour < 12) {
        $greeting = "Morning";
    } elseif ($hour >= 12 && $hour < 18) {
        $greeting = "Afternoon";
    } else {
        $greeting = "Evening";
    }

@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a href="product" class="navbar-brand">
        <img src="{{ asset('/storage/images/logo-bunihayu.png') }}" width="200" height="40" class="img-fluid">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="color: aliceblue; margin-right: 10px;">
                <p>Good {{ $greeting }}, Admin</p>
            </li>
            <li class="nav-item" style="color: aliceblue;">
                <p id="digitalClock"></p>
            </li>
        </ul>
    </div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            @if (Auth::check())
                <a href="{{ url('login/logout') }}" class="nav-link px-3">Sign Out</a>
            @else
                <a href="{{ url('login') }}" class="nav-link px-3">Sign In</a>
            @endif
        </div>
    </div>
</nav>

<script>
    function updateClock() {
        const now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();

        // Add leading zero if less than 10
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        const timeString = `${hours}:${minutes}:${seconds}`;
        document.getElementById('digitalClock').textContent = timeString;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);

    // Initial call to display the clock immediately
    updateClock();

</script>
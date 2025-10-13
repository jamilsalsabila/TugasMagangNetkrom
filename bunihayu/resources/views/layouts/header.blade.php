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

<ul class="nav">
    <li class="nav-item">
        <div class="container text-center" style="background-color: green;">
            <a class="nav-link active" aria-current="page" href="{{ url('product') }}">
                <img src="{{ asset('/storage/images/logo-bunihayu.png') }}" alt="" height="50" width="200">
            </a>
        </div>
    </li>
    <li class="nav-item">
        <div class="container justify-content-start ">
            <p>Good {{ $greeting }}, Admin</p>
        </div>
    </li>
    <li class="nav-item">
        <div class="container justify-content-start ">
            <p id="digitalClock"></p>
        </div>
    </li>
</ul>

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
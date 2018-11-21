
@extends('layouts.dashboard')

@section('content')

<div class="card">
    <form action="{{ route('handleRegistrationForm3') }}" method="POST">
        <div class="card-header">
            <h3 class="Session Information">Session Information</h3>
            <h6>Morning Session: $145</h6>
            <h6>Afternoon Session: $145</h6>
            <h6>Choose both Morning and Afternoon Session for only: $245</h6>
        </div>

        <div class="card-body">
            <div class="Week1">
                <input type="radio" name="Week1" value="wholeWeek1"> Week 1 (June 25 - June 29) - Both Session: <span
                    class="font-weight-bold">$245</span><br>
                <input type="radio" name="Week1" value="moringWeek1"> Morning Session (8:30 AM - 12:00 PM) - Week 1:
                <span class="font-weight-bold">$145</span><br>
                <input type="radio" name="Week1" value="afternoonWeek1"> Afternoon Session (12:30 AM - 4:00 PM) - Week
                1: <span class="font-weight-bold">$145</span><br>
            </div>
            <br>

            <div class="week2">
                <h6>Notice: No camp in July 4th</h6>
                <input type="radio" name="Week2" value="wholeWeek2"> Week 2 (July 2 - July 6) - Both Session: <span
                    class="font-weight-bold">$245</span><br>
                <input type="radio" name="Week2" value="moringWeek2"> Morning Session (8:30 AM - 12:00 PM) - Week 2:
                <span class="font-weight-bold">$145</span><br>
                <input type="radio" name="Week2" value="afternoonWeek2"> Afternoon Session (12:30 AM - 4:00 PM) - Week
                2: <span class="font-weight-bold">$145</span><br>
            </div>
            <br>

            <div class="week3">
                <input type="radio" name="Week3" value="wholeWeek3"> Week 3 (July 9 - July 13) - Both Session: <span
                    class="font-weight-bold">$245</span><br>
                <input type="radio" name="Week3" value="moringWeek3"> Morning Session (8:30 AM - 12:00 PM) - Week 3:
                <span class="font-weight-bold">$145</span><br>
                <input type="radio" name="Week3" value="afternoonWeek3"> Afternoon Session (12:30 AM - 4:00 PM) - Week
                3: <span class="font-weight-bold">$145</span><br>
            </div>
            <br>

            <div class="week-4">
                <input type="radio" name="Week4" value="wholeWeek4"> Week 4 (June 16 - July 20) - Both Session: <span
                    class="font-weight-bold">$245</span><br>
                <input type="radio" name="Week4" value="moringWeek4"> Morning Session (8:30 AM - 12:00 PM) - Week 4:
                <span class="font-weight-bold">$145</span><br>
                <input type="radio" name="Week4" value="afternoonWeek4"> Afternoon Session (12:30 AM - 4:00 PM) - Week
                4: <span class="font-weight-bold">$145</span><br>
            </div>
            <br>

            <div class="week-5">
                <input type="radio" name="Week5" value="wholeWeek5"> Week 5 (June 23 - June 27) - Both Session: <span
                    class="font-weight-bold">$245</span><br>
                <input type="radio" name="Week5" value="moringWeek5"> Morning Session (8:30 AM - 12:00 PM) - Week 5:
                <span class="font-weight-bold">$145</span><br>
                <input type="radio" name="Week5" value="afternoonWeek5"> Afternoon Session (12:30 AM - 4:00 PM) - Week
                5: <span class="font-weight-bold">$145</span><br>
            </div>
            <br>

            <h4 class="extendCare">Extended Care</h4>
            <input type="checkbox" name="extendCare" aria-label=""> I would like extended care from 7:00 AM - 8:30 AM and/or 4:00PM -
            5:30PM
            - <span class="font-weight-bold">$15 per day</span>.<br>
        </div>

        <div class="card-footer">
            <div style="text-align:right">
                {{ csrf_field() }}
                <button type="button" class="btn btn-secondary">BACK</button>
                <button type="submit" class="btn btn-primary">REVIEW</button>
            </div>
        </div>

    </form>
</div>


@endsection
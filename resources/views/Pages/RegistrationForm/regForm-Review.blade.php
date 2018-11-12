@extends('layouts.registrationForm')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="Review">Review</h3>
        <br><br>
        <h5>Please review all information before checkout</h5>

        <div class="card-body">



            <div class="row">
                <h6>Total amount to pay:</h6>
            </div>
            <br>
            <br>
            <div class="row">
                <h6 class="term_and_Condition">Terms and Conditions</h6>
                    <p>
                        Your payment confirms your registration and your agreement of the following terms and
                        condition:
                        I am aware of the camp activities described on the camp website and I give my permission for my
                        child to participate in these activities, unless indicated above.
                    </p>
                    <p>
                        The information entered is true to the best of my knowledge. I understand that I am financially
                        responsible for all fees and that all payments must be received by the first day of camp. All
                        fees are non-refundable and there will be no refunds or exchanges for missed days. Parents are
                        asked to notify Camp Izza if their child is ill or will not be attending as expected. Camp
                        Director will attempt to call parents/guardians and/or emergency contacts if campers do not
                        arrive to camp when expected.
                    </p>
                    <p>
                        I authorize Camp Izza to have and use the photos and video of the person named above in camp
                        promotional materials.
                        I agree to release, hold harmless, and indemnify Camp Izza, its trustees, staff, family members
                        of employees, vendors, students, volunteers or insurers, or their heirs or representatives for
                        any and all claims of any nature whatsoever, including, but not limited to, those related to
                        and arising from personal injuries, illnesses, or fatality that my child may suffer or incur
                        while he/she is on the Camp Izza campus or while using the facilities and equipment. I agree to
                        not hold Camp Izza responsible for loss of or damage to any possessions my child brings to the
                        camp and campus. I hereby agree to indemnify Camp Izza against any claims of any third parties
                        (including, but not exclusively, members of the child's family and other camp participants) for
                        damages or losses incurred by them as a result of a child's participation in Camp Izza or
                        presence on campus.
                    </p>
                    <p>
                        I understand that registration is on a first-come, first serve basis, that my camper's spot
                        will only be reserved upon receipt of payment and that returned checks will incur a $25 fee.
                    </p>
            </div>      
                <div class="row">
                    <input type="checkbox" aria-label=""> <span class="font-weight-bold">I Agree to terms above</span><br>
                </div>
        </div>

            <div class="card-footer">
            <div style="text-align:right">
                    <button type="button" class="btn btn-secondary">BACK</button>
                    <button type="submit" class="btn btn-success">PAY NOW</button>
                </div>
            </div>
            @endsection
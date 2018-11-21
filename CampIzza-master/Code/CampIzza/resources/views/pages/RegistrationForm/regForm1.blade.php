@extends('layouts.dashboard')

@section('content')


<div class="card">
    <form action="{{ route('handleRegistrationForm1') }}" method="POST">
        <div class="card-header">

            <h2 class="registrationForm">Registration Form</h2>
        </div>

        <div class="card-body">
            <h3 class="Information">Information</h3>
            <div class="row">
                <div class="col">
                    <label for="camperName">Camper's Name</label>
                    <input type="text" class="form-control" name ="camperName" place_holder="enter camper's name">
                </div>

                <div class="col">
                    <label for="camperSchool">Current School</label>
                    <input type="text" class="form-control" name ="camperSchool">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="inputGender">Gender</label>
                    <select class="form-control" name="camperGender">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col">
                    <label for="camperGrade">Grade in the Fall</label>
                    <input type="text" class="form-control" name="camperGrade">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="camperDOB">Date of Birth</label>
                    <input type="text" class="form-control" name="camperDOB">
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <br>
            <h3 class="Uniform">Uniform</h3>
            <div class="row">
                <div class="col">
                    <label for="camperShirtSize">T-Shirt Size</label>
                    <select class="form-control" name="camperShirtSize">
                        <option selected>Choose...</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <div class="col">
                    <label for="numShirt">Numbers of T-Shirt</label>
                    <input type="text" class="form-control" name="numShirt">
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div style="text-align:right">
                {{ csrf_field() }}
                <button type="button" class="btn btn-secondary">CANCEL</button>
                <button type="submit" class="btn btn-primary">NEXT</button>
            </div>
        </div>

    </form>
</div>



@endsection
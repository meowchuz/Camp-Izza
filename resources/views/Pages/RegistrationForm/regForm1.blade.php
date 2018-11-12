@extends('layouts.registrationForm')

@section('content')


<div class="card">

    <div class="card-header">
        <h2 class="registrationForm">Registration Form</h2>
    </div>

    <div class="card-body">
        <h3 class="Information">Information</h3>
        <div class="row">
            <div class="col">
                <label for="camperName">Camper's Name</label>
                <input type="text" class="form-control" id="input-camperName" place_holder="enter camper's name">
            </div>

            <div class="col">
                <label for="camperSchool">Current School</label>
                <input type="text" class="form-control" id="input-camperSchool">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="inputGender">Gender</label>
                <select class="form-control" id="inputGender">
                    <option selected>Choose...</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="col">
                <label for="camperGrade">Grade in the Fall</label>
                <input type="text" class="form-control" id="input-camperGrade">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="camperDOB">Date of Birth</label>
                <input type="text" class="form-control" id="input-DOB" place_holder="">
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
                <input type="text" class="form-control" id="input-camperShirtSize" place_holder="XS-S-M-L-XL">
            </div>

            <div class="col">
                <label for="numShirt">Numbers of T-Shirt</label>
                <input type="text" class="form-control" id="input-numShirt">
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div style="text-align:right">
            <button type="button" class="btn btn-secondary">CANCEL</button>
            <button type="submit" class="btn btn-primary">NEXT</button>
        </div>
    </div>
</div>



@endsection
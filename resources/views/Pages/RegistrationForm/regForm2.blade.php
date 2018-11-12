@extends('layouts.registrationForm')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="Health Information">Health Information</h3>

        <div class="card-body">
            <h4 class="Doctor">Doctor Information</h4>
            <div class="row">
                <div class="col">
                    <label for="camperDoctor">Name</label>
                    <input type="text" class="form-control" id="input-Doctor" place_holder="Current doctor's name">
                </div>

                <div class="col">
                    <label for="camperInsurance">Insurance Carrier</label>
                    <input type="text" class="form-control" id="input-camperInsurance">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="doctorPhoneNum">Phone Number</label>
                    <input type="text" class="form-control" id="input-doctorPhoneNum" place_holder="(###) ###-####">
                </div>

                <div class="col">
                    <label for="insuranceHolder">Policy Holder's Name</label>
                    <input type="text" class="form-control" id="input-camperInsurance">
                </div>
            </div>
            <br>
            <h4 class="healthStatus">Personal Health Status</h4>
            <div class="row">
                <div class="col">
                    <label for="camperChronic">Chronic conditions or illnesses of which we shoyuld be aware</label>
                    <input type="text" class="form-control" id="input-chronic" place_holder="Please write all here">
                </div>

                <div class="col">
                    <label for="camperRestrictActivities">Are there any activities at camp that your child cannot
                        participate in?</label>
                    <input type="text" class="form-control" id="input-camperRestrictActivities">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="camperAllergies">Will your child be taking any medication at camp?</label>
                    <input type="text" class="form-control" id="input-camperAllergies" place_holder="Please write all here">
                </div>

                <div class="col">
                    <label for="camperMedicalTreatment">Has your child undergone any medical treatments?</label>
                    <input type="text" class="form-control" id="input-camperMedicalTreatments">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="camperMedicationTaking">Will your child be taking any medication at camp?</label>
                    <select class="form-control" id="input-camperMedicationTaking">
                        <option selected>Choose...</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="col">
                    <label for="camperAll_ImmunizationsReceived">Has your child received all current immunizations?</label>
                    <select class="form-control" id="input-camperAll_ImmunizationsReceived">
                        <option selected>Choose...</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="camperMedicationList">If "Yes", please list medications</label>
                    <input type="text" class="form-control" id="input-camperMedicationList" place_holder="Please write all here">
                </div>
                <div class="col">
                    <label for="camper-lastTetanus">If "Yes", date of last tetanus shot</label>
                    <input type="text" class="form-control" id="input-lastTetanus" place_holder="MM/DD/YYYY">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="camperComment">Any comments about this camper?</label>
                    <input type="text" class="form-control" id="input-camperComment" place_holder="Please write all here">
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>

            <div class="card-footer">
                <div style="text-align:right">
                    <button type="button" class="btn btn-secondary">CANCEL</button>
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </div>
            </div>

            @endsection
@extends('layouts.dashboard')

@section('pageTitle')
Campers
@endsection

@section('header')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center bg--green">
    &nbsp;
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/pages/owner/campers.js') }}"></script>
@endsection

@section('content')
<div class="container mt--7">
    <div class="card shadow">
        <div class="card-header bg-white border-0">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-0">List of Campers</h3>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <th>Camper's name</th>
                    <th>Gender</th>
                    <th class="text-right">Date of Birth</th>
                    <th></th>
                </thead>
                <tbody>
                    @if (sizeof($campers))
                        @foreach ($campers as $camper)
                            <tr>
                                <td>
                                    {{ $camper->name }}
                                </td>
                                <td>
                                    {{ ucfirst($camper->gender) }}
                                </td>
                                <td class="text-right">
                                    {{ $camper->birthday }}
                                </td>
                                <td class="text-right">
                                    <button class="btn btn-green no-shadow btn-parent" type="button" data-parent="{{ $camper->parent }}" data-toggle="modal" data-target="#parentContactModal">
                                        <i class="fa fa-phone mr-2" aria-hidden="true" data-parent="{{ $camper->parent }}"></i> Parent contact
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center text-gray">
                                No campers
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer py-4">
            <nav aria-label="pagination">
                <ul class="pagination justify-content-end mb-0">
                    @if ($campers->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $campers->previousPageUrl() }}" tabindex="-1">
                    @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                    @endif
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item d-flex align-items-center mx-4">
                        {{ $start }} to {{ $end }} of {{ $campers->total() }}
                    </li>
                    @if ($campers->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $parecampersnts->nextPageUrl() }}">
                    @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">
                    @endif
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Contact modal -->
<div class="modal fade" id="parentContactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">            
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="contactModalLabel">Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h6 class="heading-small text-muted mb-4">Parent information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-parent-1">Parent #1</label>
                                <input type="text" id="input-parent-1" class="form-control form-control-alternative" disabled placeholder="Parent #1" autocomplete="off" spellcheck="false" name="parent_1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email-1">Email #1</label>
                                <input type="email" id="input-email-1" class="form-control form-control-alternative" disabled placeholder="Email #1" autocomplete="off" spellcheck="false" name="email_1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-parent-2">Parent #2</label>
                                <input type="text" id="input-parent-2" class="form-control form-control-alternative" disabled placeholder="Parent #2" autocomplete="off" spellcheck="false" name="parent_2">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email-2">Email #2</label>
                                <input type="email" id="input-email-2" class="form-control form-control-alternative" disabled placeholder="Email #2" autocomplete="off" spellcheck="false" name="email_2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address-1">Address #1</label>
                                <input type="text" id="input-address-1" class="form-control form-control-alternative" disabled placeholder="Address #1" autocomplete="off" spellcheck="false" name="address_1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">Country</label>
                                <select name="country" id="input-country" class="form-control form-control-alternative" disabled>
                                    <!-- EMPTY -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address-2">Address #2</label>
                                <input type="text" id="input-address-2" class="form-control form-control-alternative" disabled placeholder="Address #2" autocomplete="off" spellcheck="false" name="address_2">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-state">State</label>
                                <select name="state" id="input-state" class="form-control form-control-alternative" disabled>
                                    <!-- EMPTY -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">City</label>
                                <select name="city" id="input-city" class="form-control form-control-alternative" disabled>
                                    <!-- EMPTY -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-zipcode">Zip Code</label>
                                <input type="number" id="input-zipcode" class="form-control form-control-alternative" disabled placeholder="Zip Code" autocomplete="off" spellcheck="false" name="zipcode">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Phone numbers -->
                <h6 class="heading-small text-muted mb-4">Phone number <span class="font-weight-light">(please complete at least two)</span></h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-1">Phone #1</label>
                                        <input type="tel" id="input-phone-1" class="form-control form-control-alternative" disabled placeholder="Phone #1" autocomplete="off" spellcheck="false" name="phone_1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-type-1">Type</label>
                                        <select name="phone_type_1" id="input-phone-type-1" class="form-control form-control-alternative" disabled>
                                            @foreach ($phoneTypes as $key => $value)
                                                @if (isset($contact) && $contact->phone_type_1 == $key)
                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-3">Phone #3</label>
                                        <input type="tel" id="input-phone-3" class="form-control form-control-alternative" disabled placeholder="Phone #3" autocomplete="off" spellcheck="false" name="phone_3">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-type-3">Type</label>
                                        <select name="phone_type_3" id="input-phone-type-3" class="form-control form-control-alternative" disabled>
                                            @foreach ($phoneTypes as $key => $value)
                                                @if (isset($contact) && $contact->phone_type_3 == $key)
                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-2">Phone #2</label>
                                        <input type="tel" id="input-phone-2" class="form-control form-control-alternative" disabled placeholder="Phone #2" autocomplete="off" spellcheck="false" name="phone_2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-type-2">Type</label>
                                        <select name="phone_type_2" id="input-phone-type-2" class="form-control form-control-alternative" disabled>
                                            @foreach ($phoneTypes as $key => $value)
                                                @if (isset($contact) && $contact->phone_type_2 == $key)
                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-4">Phone #4</label>
                                        <input type="tel" id="input-phone-4" class="form-control form-control-alternative" disabled placeholder="Phone #4" autocomplete="off" spellcheck="false" name="phone_4">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone-type-4">Type</label>
                                        <select name="phone_type_4" id="input-phone-type-4" class="form-control form-control-alternative" disabled>
                                            @foreach ($phoneTypes as $key => $value)
                                                @if (isset($contact) && $contact->phone_type_4 == $key)
                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Emergency contacts -->
                <h6 class="heading-small text-muted mb-4">Emergency contacts <span class="font-weight-light">(someone other than parent/guardian who is authorized to pick up your child)</span></h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-name-1">Name #1</label>
                                <input type="text" id="input-emergency-name-1" class="form-control form-control-alternative" disabled placeholder="Name #1" autocomplete="off" spellcheck="false" name="emergency_name_1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-name-2">Name #2</label>
                                <input type="text" id="input-emergency-name-2" class="form-control form-control-alternative" disabled placeholder="Name #2" autocomplete="off" spellcheck="false" name="emergency_name_2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-relationship-1">Relationship #1</label>
                                <input type="text" id="input-emergency-relationship-1" class="form-control form-control-alternative" disabled placeholder="Relationship #1" autocomplete="off" spellcheck="false" name="emergency_relationship_1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-relationship-2">Relationship #2</label>
                                <input type="text" id="input-emergency-relationship-2" class="form-control form-control-alternative" disabled placeholder="Relationship #2" autocomplete="off" spellcheck="false" name="emergency_relationship_2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-phone-1">Phone #1</label>
                                <input type="tel" id="input-emergency-phone-1" class="form-control form-control-alternative" disabled placeholder="Phone #1" autocomplete="off" spellcheck="false" name="emergency_phone_1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-emergency-phone-2">Phone #2</label>
                                <input type="tel" id="input-emergency-phone-2" class="form-control form-control-alternative" disabled placeholder="Phone #2" autocomplete="off" spellcheck="false" name="emergency_phone_2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.dashboard')

@section('pageTitle')
Contact
@endsection

@section('header')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center bg--green">
    &nbsp;
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/pages/parent/contact.js') }}"></script>
<script>
    @if (isset($contact))
        var contact = {
            country: {{ $contact-> country }},
    state: { { $contact -> state } },
    city: '{{ $contact->city }}'
    }
    @endif
</script>
@endsection

@section('content')
<div class="container mt--7">
    @if (Auth::user()->fullFill)
    <form action="{{ route('updateContact') }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        @else
        <form action="{{ route('saveContact') }}" method="POST">
            @endif
            <div class="card shadow">
                <div class="card-header bg-white border-0">
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0">Contact Information</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Parent information -->
                    <h6 class="heading-small text-muted mb-4">Parent information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parent-1">Parent #1</label>
                                    <input type="text" id="input-parent-1" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->parent_1 }}" @endif placeholder="Parent #1"
                                        autocomplete="off" spellcheck="false" name="parent_1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email-1">Email #1</label>
                                    <input type="email" id="input-email-1" class="form-control form-control-alternative"
                                        value="{{ Auth::user()->email }}" disabled placeholder="Email #1" autocomplete="off"
                                        spellcheck="false" name="email_1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-parent-2">Parent #2</label>
                                    <input type="text" id="input-parent-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->parent_2 }}" @endif placeholder="Parent #2"
                                        autocomplete="off" spellcheck="false" name="parent_2">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email-2">Email #2</label>
                                    <input type="email" id="input-email-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->email_2 }}" @endif placeholder="Email #2"
                                        autocomplete="off" spellcheck="false" name="email_2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address-1">Address #1</label>
                                    <input type="text" id="input-address-1" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->address_1 }}" @endif placeholder="Address #1"
                                        autocomplete="off" spellcheck="false" name="address_1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Country</label>
                                    <select name="country" id="input-country" class="form-control form-control-alternative">
                                        <!-- EMPTY -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address-2">Address #2</label>
                                    <input type="text" id="input-address-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->address_2 }}" @endif placeholder="Address #2"
                                        autocomplete="off" spellcheck="false" name="address_2">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-state">State</label>
                                    <select name="state" id="input-state" class="form-control form-control-alternative">
                                        <!-- EMPTY -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">City</label>
                                    <input name="city" id="input-city" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->city }}" @endif placeholder="City"
                                        autocomplete="off" spellcheck="false">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-zipcode">Zip Code</label>
                                    <input type="number" id="input-zipcode" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->zipcode }}" @endif placeholder="Zip Code"
                                        autocomplete="off" spellcheck="false" name="zipcode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Phone numbers -->
                    <h6 class="heading-small text-muted mb-4">Phone number <span class="font-weight-light">(please
                            complete at least two)</span></h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone-1">Phone #1</label>
                                            <input type="tel" id="input-phone-1" class="form-control form-control-alternative"
                                                @if (isset($contact)) value="{{ $contact->phone_1 }}" @endif
                                                placeholder="Phone #1" autocomplete="off" spellcheck="false" name="phone_1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone-type-1">Type</label>
                                            <select name="phone_type_1" id="input-phone-type-1" class="form-control form-control-alternative">
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
                                            <input type="tel" id="input-phone-3" class="form-control form-control-alternative"
                                                @if (isset($contact)) value="{{ $contact->phone_3 }}" @endif
                                                placeholder="Phone #3" autocomplete="off" spellcheck="false" name="phone_3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone-type-3">Type</label>
                                            <select name="phone_type_3" id="input-phone-type-3" class="form-control form-control-alternative">
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
                                            <input type="tel" id="input-phone-2" class="form-control form-control-alternative"
                                                @if (isset($contact)) value="{{ $contact->phone_2 }}" @endif
                                                placeholder="Phone #2" autocomplete="off" spellcheck="false" name="phone_2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone-type-2">Type</label>
                                            <select name="phone_type_2" id="input-phone-type-2" class="form-control form-control-alternative">
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
                                            <input type="tel" id="input-phone-4" class="form-control form-control-alternative"
                                                @if (isset($contact)) value="{{ $contact->phone_4 }}" @endif
                                                placeholder="Phone #4" autocomplete="off" spellcheck="false" name="phone_4">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone-type-4">Type</label>
                                            <select name="phone_type_4" id="input-phone-type-4" class="form-control form-control-alternative">
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
                    <h6 class="heading-small text-muted mb-4">Emergency contacts <span class="font-weight-light">(someone
                            other than parent/guardian who is authorized to pick up your child)</span></h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-name-1">Name #1</label>
                                    <input type="text" id="input-emergency-name-1" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_name_1 }}" @endif
                                        placeholder="Name #1" autocomplete="off" spellcheck="false" name="emergency_name_1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-name-2">Name #2</label>
                                    <input type="text" id="input-emergency-name-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_name_2 }}" @endif
                                        placeholder="Name #2" autocomplete="off" spellcheck="false" name="emergency_name_2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-relationship-1">Relationship
                                        #1</label>
                                    <input type="text" id="input-emergency-relationship-1" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_relationship_1 }}" @endif
                                        placeholder="Relationship #1" autocomplete="off" spellcheck="false" name="emergency_relationship_1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-relationship-2">Relationship
                                        #2</label>
                                    <input type="text" id="input-emergency-relationship-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_relationship_2 }}" @endif
                                        placeholder="Relationship #2" autocomplete="off" spellcheck="false" name="emergency_relationship_2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-phone-1">Phone #1</label>
                                    <input type="tel" id="input-emergency-phone-1" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_phone_1 }}" @endif
                                        placeholder="Phone #1" autocomplete="off" spellcheck="false" name="emergency_phone_1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-emergency-phone-2">Phone #2</label>
                                    <input type="tel" id="input-emergency-phone-2" class="form-control form-control-alternative"
                                        @if (isset($contact)) value="{{ $contact->emergency_phone_2 }}" @endif
                                        placeholder="Phone #2" autocomplete="off" spellcheck="false" name="emergency_phone_2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 text-right">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary" type="button" id="btn-cancel">CANCEL</button>
                    <button class="btn btn-brown" type="submit" id="btn-submit">SAVE CHANGE</button>
                </div>
            </div>
        </form>
</div>
@endsection
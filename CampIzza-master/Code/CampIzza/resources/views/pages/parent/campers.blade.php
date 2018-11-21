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
<script src="{{ asset('js/pages/parent/campers.js') }}"></script>
@endsection

@section('content')
<div class="container mt--7">
    <div class="card shadow">
        <div class="card-header bg-white border-0">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-0">List of Campers</h3>
                <button class="btn btn-blue" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-user-plus mr-2" aria-hidden="true"></i> Add camper
                </button>
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
                                    <button class="btn btn-white no-shadow btn-update" type="button" data-camper="{{ $camper->id }}" data-toggle="modal" data-target="#updateModal">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true" data-camper="{{ $camper->id }}"></i>
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
    </div>
</div>

<!-- Add camper modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('addCamper') }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="addModalLabel">Add camper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Camper's name</label>
                        <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Camper's name" autocomplete="off" spellcheck="false" name="camper_name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-gender">Gender</label>
                        <select name="camper_gender" id="input-gender" class="form-control form-control-alternative">
                            <option value="boy">Boy</option>
                            <option value="girl">Girl</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-birthday">Date of Birth</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="tmp-date" class="form-control form-control-alternative">
                                    @for ($i = 1; $i < 32; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="tmp-month" class="form-control form-control-alternative">
                                    @foreach ($months as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="tmp-year" class="form-control form-control-alternative">
                                    @for ($i = $currenYear - 4; $i > ($currenYear - 13); $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="camper_birthday" id="input-birthday-hidden">
                    </div>
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add camper</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Update camper modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="update-form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="updateModalLabel">Camper information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="input-name__update">Camper's name</label>
                        <input type="text" id="input-name__update" class="form-control form-control-alternative" placeholder="Camper's name" autocomplete="off" spellcheck="false" name="camper_name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-gender__update">Gender</label>
                        <select name="camper_gender" id="input-gender__update" class="form-control form-control-alternative">
                            <option value="boy">Boy</option>
                            <option value="girl">Girl</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-birthday">Date of Birth</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="tmp-date__update" class="form-control form-control-alternative">
                                    @for ($i = 1; $i < 32; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="tmp-month__update" class="form-control form-control-alternative">
                                    @foreach ($months as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="tmp-year__update" class="form-control form-control-alternative">
                                    @for ($i = $currenYear - 4; $i > ($currenYear - 13); $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="camper_birthday" id="input-birthday-hidden__update">
                        <input type="hidden" name="camper_id" id="input-camper-id">
                        {{ method_field('PATCH') }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

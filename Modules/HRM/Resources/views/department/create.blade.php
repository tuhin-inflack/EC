@extends('hrm::layouts.master')
@section('title', 'Add new department ')

@section("content")
    @php

        /* $tab_action = isset($employee_id) ? '' : 'disabled';
         $employee_id = isset($employee_id) ? $employee_id : ''; */
    @endphp
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="repeat-form">Add New Department</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="card-content collapse show" style="">
                <div class="card-body">
                    {!! Form::open(['url' =>  '/hrm/department', 'class' => 'form',' novalidate']) !!}
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-grid"></i> Department form </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                                        {{ Form::label('name', 'Department Name') }}
                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Human Resource', 'required' => 'required', 'data-validation-required-message'=>'Enter department name']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->has('name'))
                                            <div class="help-block">  {{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        {{ Form::label('name', 'Department Code') }}
                                        {{ Form::text('department_code', null, ['class' => 'form-control', 'placeholder' => 'HR']) }}
                                    </div>
                                </div>
                                <div class="form-actions col-md-12 ">
                                    <div class="pull-right">
                                        {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                                        <a href="{{ url('/hrm/department') }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="la la-times"></i> Cancel
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/plugins/forms/validation/form-validation.css') }}">

@endpush
@push('page-js')
    <script src="{{ asset('theme/vendors/js/ui/jquery.sticky.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"
            type="text/javascript"></script>

    <script src="{{ asset('theme/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/vendors/js/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>


    <script src="{{ asset('theme/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/js/scripts/forms/validation/form-validation.js') }}" type="text/javascript"></script>

@endpush
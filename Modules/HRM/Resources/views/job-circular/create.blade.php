@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.list_title'))
{{--@section("employee_create", 'active')--}}


@section('content')

    @if (!Auth::guest())
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Job circular form</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="{{url('/hrm/job-circular/create')}}" class="btn btn-primary btn-sm"><i
                                    class="ft-plus white"></i> @lang('labels.add')</a>

                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-grid"></i> @lang('hrm::designation.designation_form')
                        </h4>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                                    {{ Form::label('name', trans('labels.name'), ['class' => 'required']) }}
                                    {{ Form::text('name', null, ['class' => ' form-control', 'placeholder' => 'Senior HR Executive', 'required' => 'required', 'data-validation-required-message'=> Lang::get('labels.This field is required')]) }}
                                    <div class="help-block"></div>
                                    @if ($errors->has('name'))
                                        <div class="help-block">  {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    {{ Form::label('short_name', trans('labels.short_name') . " ( ". trans('labels.optional'). " ) " ) }}
                                    {{ Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => 'SHR']) }}
                                </div>
                                {{ Form::hidden('id', null) }}
                            </div>
                            <div class="form-actions col-md-12 ">
                                <div class="pull-right">
                                    {{ Form::button('<i class="la la-check-square-o"></i> '. trans('labels.save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                                    <a href="{{ url('/hrm/designation') }}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="la la-times"></i> @lang('labels.cancel')
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>

        </div>

    @endif



@endsection

@php
    if ($organizableType == \Illuminate\Support\Facades\Config::get('constants.research')) {
        $module = 'rms';
        $title = trans('rms::research_proposal.menu_title');
    } else {
        $module = 'pms';
        $title = trans('pms::project_proposal.menu_title');
    }
@endphp

@extends($module . '::layouts.master')
@section('title', $title)

@section('content')
    <section>
        <div class="row match-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{ Form::open(['route' => 'organizations.store', 'class' => 'form']) }}
                            <div class="form-body">
                                <h4 class="form-section"><i
                                            class="ft-grid"></i>
                                    @lang('pms::project_proposal.organization_add_form')
                                </h4>
                                <h4>
                                    @if ($organizableType == \Illuminate\Support\Facades\Config::get('constants.research'))
                                        @lang('rms::research_proposal.research_title') : {{ $organizable->title  }}
                                    @else
                                        @lang('pms::project_proposal.project_title') : {{ $organizable->title  }}
                                    @endif
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group {{ $errors->has('organization_id') ? ' error' : '' }}">
                                                {{ Form::label('organization_id',  trans('pms::project_proposal.organization_name'),
                                                    ['class' => 'required']) }}
                                                @php
                                                    $organizations->push([
                                                        'id' => 'add_new',
                                                        'name' => '+ ' . trans('pms::project_proposal.add_new_organization')
                                                    ]);
                                                    $organizationSelectOptions = $organizations->pluck('name', 'id');
                                                @endphp
                                                {{ Form::select('organization_id', $organizationSelectOptions, null, [
                                                    'class' => 'form-control select2',
                                                    'placeholder' => trans('labels.select'),
                                                    'data-validation-required-message' => trans('labels.This field is required')
                                                ]) }}

                                                <div class="help-block"></div>
                                                @if ($errors->has('organization_id'))
                                                    <div class="help-block">  {{ $errors->first('organization_id') }}</div>
                                                @endif
                                            </div>
                                            {{ Form::hidden('organizable_type', $organizableType) }}
                                            {{ Form::hidden('organizable_id', $organizable->id) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row addNewOrganization "
                                     style="{{ $errors->has('name') ? '' : 'display: none'}}">
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
                                                {{ Form::label('name', trans('pms::project_proposal.organization_name'), ['class' => 'required']) }}
                                                <br/>
                                                {{ Form::text('name',  old('name'),  ['id'=>'', 'class' => 'addOrganizationInput form-control', 'placeholder' => 'Enter organization name', 'data-validation-required-message' => trans('labels.This field is required')]) }}
                                                <div class="help-block"></div>
                                                @if ($errors->has('name'))
                                                    <div class="help-block">  {{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group {{ $errors->has('email') ? ' error' : '' }}">
                                                {{ Form::label('email', trans('labels.email_address')) }}
                                                <br/>
                                                {{ Form::text('email',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization email']) }}
                                                <div class="help-block"></div>
                                                @if ($errors->has('email'))
                                                    <div class="help-block">  {{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group ">
                                                {{ Form::label('mobile', trans('labels.mobile')) }}
                                                <br/>
                                                {{ Form::text('mobile',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization mobile']) }}
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group ">
                                                {{ Form::label('address', trans('labels.address')) }}
                                                <br/>
                                                {{ Form::text('address',  null,    ['id'=>'', 'class' => ' form-control', 'placeholder' => 'Enter organization address']) }}
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group ">
                                                {{ Form::label('division_id', trans('division.division')) }}
                                                <br/>
                                                {{ Form::select('division_id',  [], null, ['class' => ' form-control select2', 'placeholder' =>
                                                trans('labels.select')]) }}
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                            <div class="form-group ">
                                                {{ Form::label('district_id', trans('district.district')) }}
                                                <br/>
                                                {{ Form::select('district_id',  [], null, ['class' => ' form-control select2', 'placeholder' => trans('labels.select')]) }}
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-actions col-md-12 ">
                                        <div class="pull-right">
                                            {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['id' => 'submitOrganization', 'type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                                            <a href="{{ URL::previous() }}">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="la la-times"></i> @lang('labels.cancel')
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            $('select[name=organization_id]').on('change', function (e) {
                let organizationSelectValue = $(this).val();

                if (organizationSelectValue == 'add_new') {
                    $('input,select,textarea').jqBootstrapValidation('destroy');
                    $('input,select,textarea').jqBootstrapValidation();
                    $(".addNewOrganization").show();
                    $(".addOrganizationInput").focus();
                } else if (organizationSelectValue == "") {
                    $('input,select,textarea').jqBootstrapValidation();
                    $(".addNewOrganization").hide();
                } else {
                    $('input,select,textarea').jqBootstrapValidation('destroy');
                    $(".addNewOrganization").hide();
                }
            });

            let divisions = [
                {
                    id: 1,
                    text: '{!! trans('division.barishal') !!}',
                    districts: [
                        {id: 1, text: '{{ trans('district.barisal') }}'},
                        {id: 2, text: '{{ trans('district.barguna') }}'},
                        {id: 3, text: '{{ trans('district.bhola') }}'}
                    ]
                },
                {
                    id: 2,
                    text: '{!! trans('division.chittagong') !!}',
                    districts: [
                        {id: 4, text: '{{ trans('district.brahmanbaria') }}'},
                        {id: 5, text: '{{ trans('district.comilla') }}'},
                        {id: 6, text: '{{ trans('district.chandpur') }}'}
                    ]
                },
                {
                    id: 3,
                    text: '{!! trans('division.dhaka') !!}',
                    districts: [
                        {id: 7, text: '{{ trans('district.dhaka') }}'},
                        {id: 8, text: '{{ trans('district.gazipur') }}'},
                        {id: 9, text: '{{ trans('district.kishoreganj') }}'}
                    ]
                },
            ];

            let divisionSelect = 'select[name=division_id]';

            $(divisionSelect).select2({
                data: divisions
            });

            $(divisionSelect).on('change', function (e) {
                let districtSelect = 'select[name=district_id]';

                $(districtSelect).empty();

                let divisionId = $(this).val();

                if (divisionId) {
                    let division = divisions.find(division => division.id == divisionId);


                    $(districtSelect).select2({
                        data: division.districts
                    });
                }

            });
        });
    </script>
@endpush
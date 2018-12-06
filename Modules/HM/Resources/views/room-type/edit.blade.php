@extends('hm::layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">{{trans('hm::roomtype.edit_card_title')}}</h4>
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
                            @if($errors->has('room_types'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ $errors->first('room_types') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::open(['url' => [ '/hm/room-types', $roomType->id], 'method' => 'put', 'files' => true]) !!}
                            <h4 class="form-section"><i class="la  la-building-o"></i>{{trans('hm::roomtype.edit_form_title')}}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required">{{trans('labels.name')}}</label>
                                        <input type="text"
                                               placeholder="e.g AC Single"
                                               value="{{ $roomType->name}}"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" autofocus required/>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required">{{trans('hm::roomtype.capacity')}}</label>
                                        <input type="number"
                                               placeholder="e.g 4"
                                               min="1"
                                               value="{{ $roomType->capacity }}"
                                               class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}"
                                               name="capacity" required/>

                                        @if ($errors->has('capacity'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('capacity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required">{{trans('hm::roomtype.general_rate')}}</label>
                                        <input type="number"
                                               placeholder="e.g 500"
                                               value="{{ $roomType->general_rate }}"
                                               class="form-control{{ $errors->has('general_rate') ? ' is-invalid' : '' }}"
                                               name="general_rate" required/>

                                        @if ($errors->has('general_rate'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('general_rate') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('hm::roomtype.govt_rate')}}</label>
                                        <input type="number"
                                               placeholder="e.g 500"
                                               value="{{ $roomType->govt_rate }}"
                                               class="form-control{{ $errors->has('govt_rate') ? ' is-invalid' : '' }}"
                                               name="govt_rate" required/>

                                        @if ($errors->has('govt_rate'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('govt_rate') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('hm::roomtype.bard_emp_rate')}}</label>
                                        <input type="number"
                                               placeholder="e.g 500"
                                               value="{{ $roomType->bard_emp_rate }}"
                                               class="form-control{{ $errors->has('bard_emp_rate') ? ' is-invalid' : '' }}"
                                               name="bard_emp_rate" required/>

                                        @if ($errors->has('bard_emp_rate'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bard_emp_rate') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('hm::roomtype.special_rate')}}</label>
                                        <input type="number"
                                               placeholder="e.g 500"
                                               value="{{ $roomType->special_rate }}"
                                               class="form-control{{ $errors->has('special_rate') ? ' is-invalid' : '' }}"
                                               name="special_rate"/>

                                        @if ($errors->has('special_rate'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('special_rate') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> {{trans('labels.update')}}
                                </button>
                                <a class="btn btn-warning mr-1" role="button" href="{{url(route('room-types.index'))}}">
                                    <i class="ft-x"></i> {{trans('labels.cancel')}}
                                </a>
                            </div>
                            {!! Form::close() !!}
                                <h5>{{trans('labels.note')}}</h5>
                                <p>** {{trans('labels.currency')}} {{trans('labels.bdt')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

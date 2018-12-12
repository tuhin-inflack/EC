@if($page == 'create')
    {!! Form::open(['route' =>  'room-types.create', 'class' => 'form', 'novalidate']) !!}
@else
    {!! Form::open(['route' => [ 'room-types.update', $roomType->id]]) !!}
    @method('PUT')
@endif
<h4 class="form-section"><i class="la  la-building-o"></i>{{trans('hm::roomtype.create_form_title')}}</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('name') ? ' error' : '' }}">
            {!! Form::label('name', __('labels.name'), ['class' => 'form-label required']) !!}
            {!! Form::text('name', $page == 'create' ? old('name') : $roomType->name, ['class' => 'form-control', 'autofocus', 'required',
            "placeholder" => "e.g AC Single", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('labels.name')])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('name'))
                <div class="help-block">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('capacity') ? ' error' : '' }}">
            {!! Form::label('capacity', __('hm::roomtype.capacity'), ['class' => 'form-label required']) !!}
            {!! Form::number('capacity', $page == 'create' ? old('capacity') : $roomType->capacity, ['class' => 'form-control', 'required', 'min' => '1',
            "placeholder" => "e.g 4", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::roomtype.capacity')]),
            'data-validation-number-message'=>trans('validation.numeric', ['attribute' => __('hm::roomtype.capacity')]),
            'data-validation-min-message'=>trans('validation.min.numeric', ['attribute' => __('hm::roomtype.capacity'), 'min' => 1])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('capacity'))
                <div class="help-block">{{ $errors->first('capacity') }}</div>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('general_rate') ? ' error' : '' }}">
            {!! Form::label('general_rate', __('hm::roomtype.general_rate'), ['class' => 'form-label required']) !!}

            {!! Form::number('general_rate', $page == 'create' ? old('general_rate') : $roomType->general_rate, ['class' => 'form-control', 'required', 'min' => '1',
            "placeholder" => "e.g 500", 'data-validation-required-message'=>trans('validation.required', ['attribute' => __('hm::roomtype.general_rate')]),
            'data-validation-number-message'=>trans('validation.numeric', ['attribute' => __('hm::roomtype.general_rate')]),
            'data-validation-min-message'=>trans('validation.min.numeric', ['attribute' => __('hm::roomtype.general_rate'), 'min' => 1])]) !!}
            <div class="help-block"></div>
            @if ($errors->has('general_rate'))
                <div class="help-block">{{ $errors->first('general_rate') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('govt_rate') ? ' error' : '' }}">
            {!! Form::label('govt_rate', __('hm::roomtype.govt_rate'), ['class' => 'form-label']) !!}
            {!! Form::number('govt_rate', $page == 'create' ? old('govt_rate') : $roomType->govt_rate, ['class' => 'form-control']) !!}
            <div class="help-block"></div>
            @if ($errors->has('govt_rate'))
                <div class="help-block">{{ $errors->first('govt_rate') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('bard_emp_rate') ? ' error' : '' }}">
            {!! Form::label('bard_emp_rate', __('hm::roomtype.bard_emp_rate'), ['class' => 'form-label']) !!}
            {!! Form::number('bard_emp_rate', $page == 'create' ? old('bard_emp_rate') : $roomType->bard_emp_rate, ['class' => 'form-control']) !!}
            <div class="help-block"></div>
            @if ($errors->has('bard_emp_rate'))
                <div class="help-block">{{ $errors->first('bard_emp_rate') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('special_rate') ? ' error' : '' }}">
            {!! Form::label('special_rate', __('hm::roomtype.special_rate'), ['class' => 'form-label']) !!}
            {!! Form::number('special_rate', $page == 'create' ? old('special_rate') : $roomType->sperial_rate, ['class' => 'form-control']) !!}
            <div class="help-block"></div>
            @if ($errors->has('special_rate'))
                <div class="help-block">{{ $errors->first('special_rate') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i>{{$page == 'create' ? __('labels.save') : __('labels.update')}}
    </button>
    <a class="btn btn-warning mr-1" role="button" href="{{url(route('room-types.index'))}}">
        <i class="ft-x"></i> @lang('labels.cancel')
    </a>
</div>
{!! Form::close() !!}
<h5>{{trans('labels.note')}}</h5>
<p>** {{trans('labels.currency')}} {{trans('labels.bdt')}}</p>

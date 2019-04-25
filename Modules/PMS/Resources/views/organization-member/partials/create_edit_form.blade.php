<div class="form-body">
    <h4 class="form-section"><i class="ft-grid"></i> @lang('member.member_adding_form') </h4>
    <h3>{{ $mode }} <strong>({{ $organization->name }})</strong></h3>
    <div class="row " style="">
        <div class="col-md-6 ">
            <div class="form-group ">
                {{ Form::label('name', trans('labels.name'), ['class' => 'required']) }}
                {{ Form::text('name',  isset($member) ? $member->name : null,  [
                    'id'=>'',
                    'class' => ' form-control required' . ($errors->has('name') ? ' is-invalid' : ''),
                    'placeholder' => 'Enter name',
                    'data-msg-required' => trans('labels.This field is required')
                    ]) }}
                <div class="help-block"></div>
                @if ($errors->has('name'))
                    <div class="help-block">  {{ trans('labels.This field is required') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group ">
                {{ Form::label('mobile', trans('labels.mobile'), ['class' => 'required']) }}
                {{ Form::text('mobile',  isset($member) ? $member->mobile : null,    [
                    'id'=>'',
                    'class' => 'form-control required' . ($errors->has('mobile') ? ' is-invalid' : ''),
                    'placeholder' => 'Enter mobile no',
                    'data-msg-required'=>trans('labels.This field is required'),
                ]) }}
                <div class="help-block"></div>
                @if ($errors->has('mobile'))
                    <div class="help-block">  {{ trans('labels.This field is required') }}</div>
                @endif
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="form-group ">
                {{ Form::label('address', trans('labels.address')) }}
                {{ Form::text('address',  isset($member) ? $member->address : null,    [
                    'id'=>'',
                    'class' => ' form-control',
                    'placeholder' => 'Enter organization address'
                ]) }}
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('gender', trans('labels.gender'), ['class' => 'required']) }}
                {{ Form::select('gender',  ['male' => trans('labels.male'), 'female' => trans('labels.female')],  isset($member) ? $member->gender : null, [
                    'class' => 'form-control member-gender-select required ' . ($errors->has('gender') ? ' is-invalid' : ''),
                    'data-msg-required'=>trans('labels.This field is required')
                ]) }}
                <div class="help-block"></div>
                @if ($errors->has('gender'))
                    <div class="help-block">  {{ trans('labels.This field is required') }}</div>
                @endif
            </div>
        </div>
        <!-- Member Age -->
        <div class="col-md-6 ">
            <div class="form-group ">
                {{ Form::label('age', trans('pms::member.member_age')) }}
                {{ Form::number('age',  isset($member) ? $member->age : null,    [
                    'id'=>'',
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 99,
                    'oninput' => "validity.valid||(value='');",
                    'placeholder' => trans('pms::member.member_age') ]) }}
                <div class="help-block"></div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group ">
                <div class="form-group {{ $errors->has('nid') ? 'error' : '' }}">
                    {{ Form::label('nid', trans('labels.nid_number')) }}
                    {{ Form::text('nid',  isset($member) ? $member->nid : null,    [
                        'id'=>'',
                        'class' => ' form-control',
                        'placeholder' => 'Enter NID number',
                        'data-rule-minlength' => 10,
                        'data-msg-minlength'=> trans('labels.At least 10 characters'),
                        'data-rule-maxlength' => 20,
                        'data-msg-maxlength'=> trans('labels.At most 20 characters'),
                        'data-rule-number' => 'true',
                        'data-msg-number' => trans('labels.Please enter a valid number'),
                        ]) }}
                    <div class="help-block"></div>
                    @if ($errors->has('nid'))
                        <div class="help-block">  {{ trans('labels.This field is required') }}</div>
                    @endif
                </div>
            </div>
        </div>

        {{ Form::hidden('organization_id', isset($organization->id) ? $organization->id : null) }}
        {{ Form::hidden('id', isset($member->id)  ? $member->id : null ) }}
        {{ Form::hidden('project_id', $project->id) }}
    </div>
    <div class="row">
        <div class="form-actions col-md-12 ">
            <div class="pull-right">
                {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['id' => 'submitOrganization', 'type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('pms-organizations.show', [$project->id, $organization->id]) }}">
                    <button type="button" class="btn btn-warning mr-1">
                        <i class="la la-times"></i> @lang('labels.cancel')
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

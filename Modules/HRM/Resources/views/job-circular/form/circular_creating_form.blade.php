<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('job_title') ? ' error' : '' }}">
            {{ Form::label('job_title', trans('labels.job_title'), ['class' => 'required'] ) }}
            {{ Form::text('job_title', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('job_title'))
                <div class="help-block">  {{ $errors->first('job_title') }}</div>
            @endif
        </div>

        <div class="form-group {{ $errors->has('vacancy_no') ? ' error' : '' }}">
            {{ Form::label('vacancy_no', 'Number of vacancy', ['class' => 'required']) }}
            {{ Form::text('vacancy_no', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('vacancy_no'))
                <div class="help-block">  {{ $errors->first('vacancy_no') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('organization_name') ? ' error' : '' }}">
            {{ Form::label('organization_name', trans('labels.organization_name'), ['class' => 'required']) }}
            {{ Form::text('organization_name', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('organization_name'))
                <div class="help-block">  {{ $errors->first('organization_name') }}</div>
            @endif
        </div>


        <div class="form-group {{ $errors->has('job_nature') ? ' error' : '' }}">
            {{ Form::label('job_nature', 'Job nature', ['class' => 'required']) }}
            {{ Form::select('job_nature', ['Full-time', 'Part-time', 'Contractual'], null, ['placeholder' => trans('labels.select'), 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('job_nature'))
                <div class="help-block">  {{ $errors->first('job_nature') }}</div>
            @endif
        </div>


    </div>
    <div class="col-md-6">

        <div class="form-group {{ $errors->has('job_location') ? ' error' : '' }}">
            {{ Form::label('job_location', 'Job location', ['class' => 'required']) }}
            {{ Form::text('gender',    null, ['placeholder' =>'', 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('job_location'))
                <div class="help-block">  {{ $errors->first('job_location') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('salary') ? ' error' : '' }}">
            {{ Form::label('salary', 'Salary', ['class' => 'required']) }}
            {{ Form::text('salary',    null, ['placeholder' =>'', 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('salary'))
                <div class="help-block">  {{ $errors->first('salary') }}</div>
            @endif
        </div>


        <div class="form-group {{ $errors->has('status') ? ' error' : '' }}">
            {{ Form::label('status', trans('labels.status'), ['class' => 'required']) }}
            {{ Form::select('status', ['Published', 'Unpublished'], null, ['placeholder' => trans('labels.select'), 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('status'))
                <div class="help-block">  {{ $errors->first('status') }}</div>
            @endif
        </div>


        <div class="form-group {{ $errors->has('job_source') ? ' error' : '' }}">
            {{ Form::label('job_source', 'Job source', ['class' => 'required']) }}
            {{ Form::text('job_source', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('job_source'))
                <div class="help-block">  {{ $errors->first('job_source') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('educational_requirement') ? ' error' : '' }}">
            {{ Form::label('educational_requirement', 'Educational requirement', ['class' => 'required']) }}
            {{ Form::textarea('educational_requirement',   null, ['placeholder' => '', 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('educational_requirement'))
                <div class="help-block">  {{ $errors->first('educational_requirement') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('experience_requirement') ? ' error' : '' }}">
            {{ Form::label('experience_requirement', 'Experience requirement', ['class' => 'required']) }}
            {{ Form::textarea('experience_requirement',   null, ['placeholder' => '', 'class' => 'form-control', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('experience_requirement'))
                <div class="help-block">  {{ $errors->first('experience_requirement') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('job_responsibility') ? ' error' : '' }}">
            {{ Form::label('job_responsibility', 'job Responsibility', ['class' => 'required']) }}
            {{ Form::textarea('job_responsibility', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('job_responsibility'))
                <div class="help-block">  {{ $errors->first('job_responsibility') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('other_benefits') ? ' error' : '' }}">
            {{ Form::label('other_benefits', 'Compensation & Other Benefits', ['class' => 'required']) }}
            {{ Form::textarea('other_benefits', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required', 'data-validation-required-message'=>trans('labels.This field is required')]) }}
            <div class="help-block"></div>
            @if ($errors->has('other_benefits'))
                <div class="help-block">  {{ $errors->first('other_benefits') }}</div>
            @endif
        </div>

    </div>


    <hr>
    {{ Form::hidden('id', null) }}
    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i>'.trans('labels.save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="la la-times"></i> @lang('labels.cancel')
                </button>
            </a>

        </div>
    </div>
</div>
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/css/editors/tinymce/tinymce.min.css')}}"/>
@endpush
@push('page-js')
    <script src="{{asset('theme/vendors/js/editors/tinymce/tinymce.js')}}" type="text/javascript"></script>
    <script src="{{asset('theme/js/scripts/editors/editor-tinymce.js')}}" type="text/javascript"></script>
    <script>

        tinymce.init({
            selector: 'textarea',
            menubar: false,
            height: 250,
            theme: 'modern',
            plugins: " advlist autolink lists link image charmap print preview textcolor anchor searchreplace visualblocks code fullscreen insertdatetime media table paste imagetools wordcount",
            toolbar: "textcolorinsertfile undo redo | fontselect fontsizeselect | styleselect| textcolor forecolor backcolor  | table  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link | image | ",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//{{asset("theme/vendors/css/editors/tinymce/tinymce.min.css")}}'
            ]
        });
    </script>
@endpush

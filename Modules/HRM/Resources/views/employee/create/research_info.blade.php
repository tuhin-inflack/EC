<div class="repeater-default">

    <div data-repeater-list="research">
        <div data-repeater-item="">
            <div class="row">
                {{--<form class="form">--}}
                <div class=" col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('organization_name', 'Organization Name') }}
                                {{ Form::text('organization_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Microsoft', 'data-validation-required-message'=>'Please enter research organization']) }}
                                <div class="help-desk"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('research_topic', 'Research Topic') }}
                                {{ Form::text('research_topic', null, ['class' => 'form-control', 'placeholder' => 'eg. Ethics', 'data-validation-required-message'=>'Please enter research topic']) }}
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('responsibilities', 'Responsibilities') }}
                                {{ Form::textarea('responsibilities', null, ['class' => 'form-control', 'placeholder' => '']) }}
                            </div>
                        </div>
                        {{ Form::hidden('employee_id', $employee_id, ['class' =>'EmployeeId']) }}

                        <hr>
                    </div>
                </div>
                <div class=" col-md-2">
                    <div class="form-group col-sm-12 col-md-2 mt-2">
                        <button type="button" class="btn btn-danger" data-repeater-delete=""><i class="ft-x"></i>
                            Remove
                        </button>
                    </div>
                </div>
            </div>
            <hr style="border-bottom: 1px solid #1E9FF2">
        </div>
    </div>
    <div class="col-md-12">
        <button type="button" data-repeater-create="" class="btn btn-primary addMore"><i class="ft-plus"></i>
            Add More
        </button>
    </div>
    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'id' => 'SubmitButton', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1"><i class="la la-times"></i> Cancel</button>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('organization_name', 'Organization Name') }}
            {{ Form::text('organization_name', null, ['class' => 'form-control', 'placeholder' => 'eg. Microsoft']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('research_topic', 'Research Topic') }}
            {{ Form::text('research_topic', null, ['class' => 'form-control', 'placeholder' => 'eg. Ethics']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('responsibilities', 'Responsibilities') }}
            {{ Form::textarea('responsibilities', null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>


    <hr>

    <div class="form-actions col-md-12 ">
        <div class="pull-right">
            {{ Form::button('<i class="la la-check-square-o"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ url('/hrm/employee') }}">
                <button type="button" class="btn btn-warning mr-1">
                    <i class="la la-times"></i> Cancel
                </button>
            </a>

        </div>

    </div>
</div>
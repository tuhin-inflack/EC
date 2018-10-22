<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('type_of_publication', 'Type of publication') }}
            {{ Form::text('type_of_publication', null, ['class' => 'form-control', 'placeholder' => 'eg. Newsletters, Journals, Bulletins,  Reports etc']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('author_name', 'Author Name') }}
            {{ Form::text('author_name',  null, ['class' => 'form-control', 'placeholder' => 'eg. John Doe']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('publication_title', 'Publication Title') }}
            {{ Form::text('publication_title', null, ['class' => 'form-control', 'placeholder' => 'Population Database of Mexico']) }}
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('publication_company', 'Publication Company ') }}
            {{ Form::text('publication_company',  null, ['class' => 'form-control', 'placeholder' => 'eg. IEEE']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('publication_company_location', 'Publication Company Location') }}
            {{ Form::text('publication_company_location',  null, ['class' => 'form-control', 'placeholder' => 'eg. NYC']) }}
        </div>
    </div>

   <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('published_date', 'Published Date') }}
            {{ Form::date('published_date',  null, ['class' => 'form-control', 'placeholder' => '']) }}
        </div>
    </div>
   <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('source_link', 'Published Source / Link') }}
            {{ Form::text('source_link',  null, ['class' => 'form-control', 'placeholder' => 'http://www.example.com/your-publication-link']) }}
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
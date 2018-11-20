<div class="repeater-default">

    <div data-repeater-list="publication">
        {{--publicationError--}}
        @php
            $oldPublications = old();
        @endphp
        @if(isset($oldPublications['publication']) && count($oldPublications['publication'])>0)
            @foreach($oldPublications['publication'] as $key => $publication)

                <div data-repeater-item="">
                    <div class="row">
                        <div class=" col-md-10">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".type_of_publication") ? ' error' : '' }}">
                                        {{ Form::label('type_of_publication', 'Type of publication') }}
                                        {{ Form::text('type_of_publication', $publication['type_of_publication'], ['class' => 'form-control', 'placeholder' => 'eg. Newsletters, Journals, Bulletins,  Reports etc', 'data-validation-required-message'=>'Please enter publication type']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".type_of_publication"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.type_of_publication") }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".author_name") ? ' error' : '' }}">
                                        {{ Form::label('author_name', 'Author Name') }}
                                        {{ Form::text('author_name',  $publication['author_name'], ['class' => 'form-control', 'placeholder' => 'eg. John Doe', 'data-validation-required-message'=>'Please author name ']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".author_name"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.author_name") }}</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".publication_title") ? ' error' : '' }}">

                                        {{ Form::label('publication_title', 'Publication Title') }}
                                        {{ Form::text('publication_title', $publication['publication_title'], ['class' => 'form-control', 'placeholder' => 'Population Database of Mexico', 'data-validation-required-message'=>'Please enter publication title ']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".publication_title"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.publication_title") }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".publication_company") ? ' error' : '' }}">

                                        {{ Form::label('publication_company', 'Publication Company ') }}
                                        {{ Form::text('publication_company',  $publication['publication_company'], ['class' => 'form-control', 'placeholder' => 'eg. IEEE', 'data-validation-required-message'=>'Please enter publication company']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".publication_company"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.publication_company") }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('publication_company_location', 'Publication Company Location') }}
                                        {{ Form::text('publication_company_location',  $publication['publication_company_location'], ['class' => 'form-control', 'placeholder' => 'eg. NYC']) }}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".published_date") ? ' error' : '' }}">

                                        {{ Form::label('published_date', 'Published Date') }}
                                        {{ Form::date('published_date',  $publication['published_date'], ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>'Please enter published date']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".published_date"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.published_date") }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->publicationError->has("publication.".$key.".source_link") ? ' error' : '' }}">

                                        {{ Form::label('source_link', 'Published Source / Link') }}
                                        {{ Form::text('source_link',  $publication['source_link'], ['class' => 'form-control', 'placeholder' => 'http://www.example.com/your-publication-link', 'data-validation-required-message'=>'Please enter publication link']) }}
                                        <div class="help-block"></div>
                                        @if ($errors->publicationError->has("publication.".$key.".source_link"))
                                            <div class="help-block">  {{ $errors->publicationError->first("publication.*.source_link") }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{ Form::hidden('employee_id', isset($publication['employee_id']) ? $publication['employee_id'] : null, ['class' =>'EmployeeId']) }}

                                <hr>

                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group col-sm-12 col-md-2 mt-2">
                                <button type="button" class="btn btn-danger" data-repeater-delete=""><i
                                            class="ft-x"></i>
                                    Remove
                                </button>
                            </div>
                        </div>

                    </div>
                    <hr style="border-bottom: 1px solid #1E9FF2">
                </div>
            @endforeach
        @else
            <div data-repeater-item="">
                <div class="row">
                    <div class=" col-md-10">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('type_of_publication', 'Type of publication') }}
                                    {{ Form::text('type_of_publication', null, ['class' => 'form-control', 'placeholder' => 'eg. Newsletters, Journals, Bulletins,  Reports etc', 'data-validation-required-message'=>'Please enter publication type']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('author_name', 'Author Name') }}
                                    {{ Form::text('author_name',  null, ['class' => 'form-control', 'placeholder' => 'eg. John Doe', 'data-validation-required-message'=>'Please author name ']) }}
                                    <div class="help-block"></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('publication_title', 'Publication Title') }}
                                    {{ Form::text('publication_title', null, ['class' => 'form-control', 'placeholder' => 'Population Database of Mexico', 'data-validation-required-message'=>'Please enter publication title ']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('publication_company', 'Publication Company ') }}
                                    {{ Form::text('publication_company',  null, ['class' => 'form-control', 'placeholder' => 'eg. IEEE', 'data-validation-required-message'=>'Please enter publication company']) }}
                                    <div class="help-block"></div>
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
                                    {{ Form::date('published_date',  null, ['class' => 'form-control', 'placeholder' => '', 'data-validation-required-message'=>'Please enter published date']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('source_link', 'Published Source / Link') }}
                                    {{ Form::text('source_link',  null, ['class' => 'form-control', 'placeholder' => 'http://www.example.com/your-publication-link', 'data-validation-required-message'=>'Please enter publication link']) }}
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            {{ Form::hidden('employee_id', $employee_id, ['class' =>'EmployeeId']) }}

                            <hr>

                        </div>
                    </div>
                    <div class=" col-md-2">
                        <div class="form-group col-sm-12 col-md-2 mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""><i
                                        class="ft-x"></i>
                                Remove
                            </button>
                        </div>
                    </div>

                </div>
                <hr style="border-bottom: 1px solid #1E9FF2">
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <button type="button" data-repeater-create="" class="btn btn-primary addMore"><i class="ft-plus"></i>
            Add More
        </button>
    </div>
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
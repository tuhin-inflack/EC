@extends('rms::layouts.master')
@section('title', trans('rms::research.research_publication_create'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('rms::research.research_publication_create')</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-h font-medium-3"></i></a>
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
                                        {!! Form::open(['url' =>  route('research-publication.store', $research->id) , 'class' => 'research-submission-tab-steps wizard-circle form','method' => 'post', 'files' => 'true']) !!}

                                        <div class="form-body">
                                            <h4 class="form-section"><i
                                                    class="la la-briefcase"></i> {{trans('rms::research.research_publication_form')}}</h4>

                                            <div class="row">
                                                <div class="col-md-8 offset-2">
                                                    <fieldset>
                                                        <div class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                                <label class="required">@lang('rms::research.research_paper_title')</label>
                                                                <br>
                                                                <input type="text" name="paper_title" class="form-control" value="{{$research->title}}" readonly>
                                                                @if ($errors->has('title'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('title') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-8 offset-2">
                                                    <fieldset>
                                                        <div class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                                <label class="required">@lang('rms::research.research_publication_short_desc')</label>
                                                                <br>
                                                                <textarea class="form-control" name="description"></textarea>
                                                                @if ($errors->has('title'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('title') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-8 offset-2">
                                                    <hr>
                                                    <fieldset>
                                                        <div class="form row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-12">
                                                                <label class="required">@lang('rms::research.research_publication_attachment')</label>
                                                                <br>
                                                                <div id="repeat-attachments">
                                                                    <input type="file"
                                                                           class="form-control"
                                                                           name="attachments[]" id="attachments">
                                                                </div>
                                                                <div class="pull-right"><br>
                                                                    <button type="button" class="btn btn-primary" id="add"><i class="ft-plus"></i></button>
                                                                </div>
                                                                @if ($errors->has('title'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('title') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-actions text-center">
                                            {!! Form::button('<i class="la la-check-square-o"></i> '.trans('labels.save') , ['type' => 'submit', 'class' => 'btn btn-primary'] ) !!}

                                            <a class="btn btn-warning mr-1" role="button" href="{{route('research.index')}}">
                                                <i class="ft-x"></i> {{trans('labels.cancel')}}
                                            </a>
                                        </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $('#add').click(function () {
            $('#repeat-attachments').append('<br><input type="file" class="form-control" name="attachments[]">');
        });
    </script>
@endpush

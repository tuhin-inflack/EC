@extends('rms::layouts.master')
@section('title', trans('rms::research_proposal.research_details'))

@section('content')
    <section class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Organizations</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="{{ route('organizations.create', $research->id) }}" class="btn btn-sm btn-primary"><i class="ft ft-plus"></i> Add Organization</a></li>
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Organization</th>
                                    <th>Attribute</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($research->organizations as $organization)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                </tr>
                                @endforeach--}}
                                <tr>
                                    <td>Inflack Limited</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>Brain Station 23</td>
                                    <td>3</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class=" col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('rms::research_proposal.research_details') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title">@lang('labels.title')</h5>
                        <pre>{{ $research->title }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('rms::research_proposal.submitted_by')</h5>
                        <pre>{{ $research->researchSubmittedByUser->name }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('rms::research_proposal.submission_date')</h5>
                        <pre>{{ date('d/m/Y,  h:mA', strtotime($research->created_at)) }}</pre>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">@lang('labels.status')</h5>
                        <pre>@lang('rms::research_proposal.' . $research->status)</pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


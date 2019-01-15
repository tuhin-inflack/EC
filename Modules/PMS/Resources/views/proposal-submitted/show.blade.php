@extends('pms::layouts.master')
@section('title', 'Show Project Proposal Request')

@section('content')

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Proposal details</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {{--<h5>Last Submission Date: {{date('d-M-Y', strtotime($projectRequest->end_date))}}</h5>--}}
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                               <strong>Title:</strong> {{ $proposal->title }}
                            </div>
                            <div class="col-12">
                              <strong>  Remarks:  </strong>{{  $proposal->remarks }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('page-js')

@endpush
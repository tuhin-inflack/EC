@extends('pms::layouts.master')
@section('title', 'Add member')

@section('content')

    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Add Member</h4>
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
                            <div class="col-12"></div>
                            <div class="col-12">
                                {{--<strong> Remarks: </strong>{{  $proposal->remarks }}--}}
                            </div>
                        </div>

                        {!! Form::open(['route' =>  'member.store-organization-member', 'class' => 'form',' novalidate']) !!}
                        @include('pms::project-members.form.add_organization_member_form')
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>

    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Member list</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>

                                        <th scope="col">@lang('labels.serial')</th>
                                        <th scope="col">@lang('labels.name')</th>
                                        <th scope="col">@lang('labels.email_address')</th>
                                        <th scope="col">@lang('labels.mobile')</th>
                                        <th scope="col">@lang('labels.address')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($organization->members)>0)
                                        @foreach($organization->members as $members)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{ $members->name }}</td>
                                                <td>{{ $members->email }}</td>
                                                <td>{{ $members->mobile }}</td>
                                                <td>{{ $members->address }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('page-js')
    <script>
        $(document).ready(function () {
            $(".addSelect2Class").select2({
                width: '100%',

            });
        });
    </script>
@endpush
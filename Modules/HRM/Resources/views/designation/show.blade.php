@extends('hrm::layouts.master')
@section('title', 'Details information about designation')


@section('content')
    {{--{{ dd($employee) }}--}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">Designation Details</h4>
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
        <div class="card-content collapse show" style="">
            <div class="card-body">

                <div class="tab-content ">
                    <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                         aria-expanded="true">
                        <table class="table ">
                            <tbody>

                            <tr>
                                <th class="">Designation Name</th>
                                <td>{{ $designation->name}}</td>
                            </tr>
                            <tr>

                                <th class="">Short Name</th>
                                <td>{{ $designation->short_name}}</td>
                            </tr>

                            </tbody>
                        </table>
                        {{--<a href="{{url('/hrm/employee/')}}"--}}
                        <a class="btn btn-small btn-info" href="{{ url('/hrm/designation') }}">Back </a>
                        <a class="btn btn-small btn-info" href="{{ url('/hrm/designation/' . $designation->id . '/edit') }}">Edit </a>

                    </div>


                </div>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">


            </div>
        </div>
    </div>

@endsection

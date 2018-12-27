@extends('tms::layouts.master')
@section('title', 'Training details')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">{{__('tms::training.show_form_title')}}</h4>
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
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>{{trans('tms::training.training_id')}}</th>
                                <td>{{$training->training_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('tms::training.training_name')}}</th>
                                <td>{{$training->training_title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('tms::training.training_participant_no')}}</th>
                                <td>{{$training->no_of_trainee}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('tms::training.start_date')}}</th>
                                <td>{{$training->start_date}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('tms::training.end_date')}}</th>
                                <td>{{$training->end_date}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('labels.status')}}</th>
                                <td>{{($training->status)? "Active":"Inactive"}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="form-actions">
                            <a href="{{URL::to( '/tms/training/'.$training->id.'/edit')}}" class="btn btn-primary"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                            <a class="btn btn-warning mr-1" role="button" href="{{url('/tms/training')}}">
                                <i class="ft-x"></i> {{trans('labels.back_page')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

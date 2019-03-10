@extends('layouts.public')
@section('title', trans('tms::training.training_list'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('tms::training.training_list')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('tms::training.training_id')}}</th>
                                    <th>{{trans('tms::training.training_name')}}</th>
                                    <th>{{trans('tms::training.start_date')}}</th>
                                    <th>{{trans('tms::training.end_date')}}</th>
                                    {{--<th>{{trans('labels.status')}}</th>--}}
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($trainings as $training)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="{{route('training.show', ['training_id' => $training->id])}}">{{$training->training_id}}</a></td>
                                        <td><a href="{{route('training.show', ['training_id' => $training->id])}}">{{$training->training_title}}</a></td>
                                        <td>{{date('d-m-Y', strtotime($training->start_date))}}</td>
                                        <td>{{date('d-m-Y', strtotime($training->end_date))}}</td>
                                        {{--<td>{{($training->status == 1)? "Active":"Inactive"}}</td>--}}
                                        <td>
                                            <span class="dropdown">
                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                              <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="{{route('training.show', ['training_id' => $training->id])}}" class="dropdown-item"><i class="ft-eye"></i> {{trans('labels.details')}}</a>
                                                <a href="{{ route('training-registration.create', ['training_id' => $training->id]) }}" class="dropdown-item"><i class="ft-plus"></i> {{trans('tms::training.registration')}}</a>
                                              </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

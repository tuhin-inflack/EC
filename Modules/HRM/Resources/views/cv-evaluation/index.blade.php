@extends('hrm::layouts.master')
@section('title', trans('hrm::employee.cv_evaluation'))

@section('content')
    <section id="user-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('hrm::employee.cv_list')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/photocopy/create')}}" class="btn btn-primary btn-sm"><i class="ft-plus white"></i>{{trans('hrm::photocopy_management.create_button')}}</a>
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered alt-pagination">
                                <thead>
                                <tr>
                                    <th>{{trans('labels.serial')}}</th>
                                    <th>{{trans('hrm::employee.applicant_name')}}</th>
                                    <th>{{trans('hrm::employee.post_title')}}</th>
                                    <th>{{trans('hrm::employee.year_of_experience')}}</th>
                                    <th>{{trans('hrm::employee.apply_date')}}</th>
                                    <th>{{trans('labels.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cvs as $key=>$cv)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <th><a href="{{route('cv.show', $key)}}" >{{$cv['applicant_name']}}</a></th>
                                        <td>{{$cv['applied_for']}}</td>
                                        <td>{{$cv['year_of_experience']}}</td>
                                        <td>{{$cv['apply_date']}}</td>
                                        <td>
                                            <span class="dropdown">
                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" class="btn btn-info dropdown-toggle"><i class="la la-cog"></i></button>
                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                <a href="" class="dropdown-item"><i class="ft-check"></i> {{trans('hrm::employee.shortlist')}}</a>
                                                <a href="" class="dropdown-item"><i class="ft-edit-2"></i> {{trans('labels.edit')}}</a>
                                                <div class="dropdown-divider"></div>
                                                  {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => [ '/', ],
                                                  'style' => 'display:inline'
                                                  ]) !!}
                                                  {!! Form::button('<i class="ft-trash"></i> '.trans('labels.delete'), array(
                                                  'type' => 'submit',
                                                  'class' => 'dropdown-item',
                                                  'title' => 'Delete the user',
                                                  'onclick'=>'return confirm("Confirm delete?")',
                                                  )) !!}
                                                  {!! Form::close()!!}
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
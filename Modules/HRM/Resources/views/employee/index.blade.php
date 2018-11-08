@extends('hrm::layouts.master')
@section('title', 'Employee List ')
{{--@section("employee_create", 'active')--}}


@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employee List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <a href="{{url('/hrm/employee/create')}}" class="btn btn-primary btn-sm"><i
                                        class="ft-plus white"></i> Add New Employee</a>

                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tel (office)</th>
                                        <th scope="col">Tel (home)</th>
                                        <th scope="col">Mobile(one)</th>
                                        <th scope="col">Mobile(two)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(1)
                                        @foreach($employeeList as $employee)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$employee->first_name}}</td>
                                                <td>{{$employee->last_name}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->gender}}</td>
                                                <td>{{$employee->department_id}}</td>
                                                <td>{{$employee->status}}</td>
                                                <td>{{$employee->tel_office}}</td>
                                                <td>{{$employee->tel_home}}</td>
                                                <td>{{$employee->mobile_one}}</td>
                                                <td>{{$employee->mobile_two}}</td>

                                                {{--<td>--}}
                                                {{--@if($projectRequest->status == 0)--}}
                                                {{--<span class="badge badge-warning">Pending</span>--}}
                                                {{--@elseif($projectRequest->status == 1)--}}
                                                {{--<span class="badge badge-success">Approved</span>--}}
                                                {{--@else--}}
                                                {{--<span class="badge badge-danger">Rejected</span>--}}
                                                {{--@endif--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                {{--<span class="dropdown">--}}
                                                <td>
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" class="btn btn-info dropdown-toggle">
                                                        <i class="la la-cog"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="{{ route('project-request.show',1) }}" class="dropdown-item"><i class="ft-eye"></i> Details</a>

                                                        <a href="{{ route('project_request.edit', 1)  }}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>

                                                    </span>
                                                </td>
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
@extends('hrm::layouts.master')
@section('title', 'Employee List ')


@section('content')
    <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Employee Details</h4>
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
                            <h2>Employee General Information</h2>
                            <table class="table">
                                <tbody>

                                <tr>
                                    <th scope="col">First Name</th>
                                    <td>{{$employee->first_name}}</td>
                                <tr>

                                    <th scope="col">Last Name</th>
                                    <td>{{$employee->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Email</th>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Gender</th>
                                    <td>{{$employee->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Department</th>
                                    <td>{{$employee->employeeDepartment->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>{{$employee->status}}</td>
                                <tr>
                                    <th scope="col">Tel (office)</th>
                                    <td>{{$employee->tel_office}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Tel (home)</th>
                                    <td>{{$employee->tel_home}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(one)</th>
                                    <td>{{$employee->mobile_one}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(two)</th>
                                    <td>{{$employee->mobile_two}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-actions">
                                <a href="{{URL::to( '/user/role/'.$employee->id.'/edit')}}"
                                   class="btn btn-primary"><i class="ft-edit-2"></i> Edit</a>
                                <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                    <i class="ft-x"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Employee Details</h4>
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
                            <h2>Employee General Information</h2>
                            <table class="table">
                                <tbody>

                                <tr>
                                    <th scope="col">First Name</th>
                                    <td>{{$employee->first_name}}</td>
                                <tr>

                                    <th scope="col">Last Name</th>
                                    <td>{{$employee->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Email</th>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Gender</th>
                                    <td>{{$employee->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Department</th>
                                    <td>{{$employee->employeeDepartment->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>{{$employee->status}}</td>
                                <tr>
                                    <th scope="col">Tel (office)</th>
                                    <td>{{$employee->tel_office}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Tel (home)</th>
                                    <td>{{$employee->tel_home}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(one)</th>
                                    <td>{{$employee->mobile_one}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(two)</th>
                                    <td>{{$employee->mobile_two}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-actions">
                                <a href="{{URL::to( '/user/role/'.$employee->id.'/edit')}}"
                                   class="btn btn-primary"><i class="ft-edit-2"></i> Edit</a>
                                <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                    <i class="ft-x"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Employee Details</h4>
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
                            <h2>Employee General Information</h2>
                            <table class="table">
                                <tbody>

                                <tr>
                                    <th scope="col">First Name</th>
                                    <td>{{$employee->first_name}}</td>
                                <tr>

                                    <th scope="col">Last Name</th>
                                    <td>{{$employee->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Email</th>
                                    <td>{{$employee->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Gender</th>
                                    <td>{{$employee->gender}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Department</th>
                                    <td>{{$employee->employeeDepartment->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Status</th>
                                    <td>{{$employee->status}}</td>
                                <tr>
                                    <th scope="col">Tel (office)</th>
                                    <td>{{$employee->tel_office}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Tel (home)</th>
                                    <td>{{$employee->tel_home}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(one)</th>
                                    <td>{{$employee->mobile_one}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Mobile(two)</th>
                                    <td>{{$employee->mobile_two}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-actions">
                                <a href="{{URL::to( '/user/role/'.$employee->id.'/edit')}}"
                                   class="btn btn-primary"><i class="ft-edit-2"></i> Edit</a>
                                <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                    <i class="ft-x"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
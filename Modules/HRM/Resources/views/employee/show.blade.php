@extends('hrm::layouts.master')
@section('title', 'Employee List ')


@section('content')

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
        <div class="card-content collapse show" style="">
            <div class="card-body">
                <ul class="nav nav-tabs nav-underline nav-justified" id="tab-bottom-line-drag">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="activeIcon12" aria-expanded="true"><i class="la la-info"></i> General</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " id="personal-tab" data-toggle="tab" href="#personal"
                           aria-controls="linkIcon12" aria-expanded="false"><i class="la la-archive"></i>
                            Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="education-tab" data-toggle="tab" href="#education"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-graduation-cap"></i> Education</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="training-tab" data-toggle="tab" href="#training"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-book"></i> Training</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="publication-tab" data-toggle="tab"
                           href="#publication"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-paperclip"></i> Publication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="research-tab" data-toggle="tab" href="#research"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-bookmark"></i> Research</a>
                    </li>

                </ul>
                <div class="tab-content ">
                    {{--employee general information--}}
                    <div class="tab-pane active show" role="tabpanel" id="general" aria-labelledby="general-tab"
                         aria-expanded="true">
                        <table class="table">
                            <tbody>

                            <tr>
                                <th scope="col">First Name</th>
                                <td>{{$employee->first_name}}</td>
                            </tr>
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
                            </tr>
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
                    </div>

                    {{--Employee Personal Info--}}
                    <div class="tab-pane " id="personal" role="tabpanel" aria-labelledby="personal-tab"
                         aria-expanded="false">
                        <table class="table">
                            <tbody>

                            <tr>
                                <th scope="col">Father's Name</th>
                                <td>{{$employee->employeePersonalInfo->father_name}}</td>
                            </tr>
                            <tr>

                                <th scope="col">Mother's Name</th>
                                <td>{{$employee->employeePersonalInfo->mother_name}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Title Name</th>
                                <td>{{$employee->employeePersonalInfo->title}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Date of Birth</th>
                                <td>{{$employee->employeePersonalInfo->date_of_birth}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Job joining date</th>
                                <td>{{$employee->employeePersonalInfo->job_joining_date}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Current position joining date</th>
                                <td>{{$employee->employeePersonalInfo->current_position_joining_date }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Current position expire date</th>
                                <td>{{$employee->employeePersonalInfo->current_position_expire_date}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Salary scale</th>
                                <td>{{$employee->employeePersonalInfo->salary_scale}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Total salary</th>
                                <td>{{$employee->employeePersonalInfo->total_salary}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Marital status</th>
                                <td>{{$employee->employeePersonalInfo->marital_status}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Number of children</th>
                                <td>{{$employee->employeePersonalInfo->number_of_children}}</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="">
                            <a href="{{URL::to( '/user/role/'.$employee->id.'/edit')}}"
                               class="btn btn-primary"><i class="ft-edit-2"></i> Edit</a>
                            <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                <i class="ft-x"></i> Back
                            </a>
                        </div>
                    </div>

                    {{--Employee Education info--}}
                    <div class="tab-pane" id="education" role="tabpanel" aria-labelledby="education-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeEducationInfo)>0)
                            @foreach($employee->employeeEducationInfo as  $education)
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th scope="col">Institute name</th>
                                        <td>{{ $education->institute_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Degree name</th>
                                        <td>{{ $education->degree_name}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Department/Section/Group</th>
                                        <td>{{ $education->department}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Passing year</th>
                                        <td>{{ $education->passing_year}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Medium</th>
                                        <td>{{ $education->medium}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Result</th>
                                        <td>{{ $education->result}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Achievement</th>
                                        <td>{{ $education->achievement}}</td>
                                    </tr>


                                    </tbody>
                                </table>
                            @endforeach
                        @else

                            <h3>Employee Education info does not exist</h3>
                        @endif
                    </div>

                    {{--Employee Training information--}}
                    <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeTrainingInfo)>0)
                            @foreach($employee->employeeTrainingInfo as $training)
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="col">Course Name</th>
                                        <td>{{$training->course_name}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Organization Name</th>
                                        <td>{{$training->organization_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Course Duration</th>
                                        <td>{{$training->course_duration}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Training Duration</th>
                                        <td>{{$training->course_duration}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Training completion year</th>
                                        <td>{{$training->training_year}}</td>
                                    </tr>


                                    <tr>
                                        <th scope="col">Organization country</th>
                                        <td>{{$training->organization_country}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Result</th>
                                        <td>{{$training->Result}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Achievement</th>
                                        <td>{{$training->achievement}}</td>
                                    </tr>


                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <h3 class="text-center">Training information not available</h3>
                        @endif
                    </div>

                    {{--Employee Publication --}}
                    <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                         aria-expanded="false">
                        @if(count($employee->employeePublicationInfo)>0)
                            @foreach($employee->employeePublicationInfo as $publication)
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="col">Type of publication</th>
                                        <td>{{$publication->type_of_publication}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Author Name</th>
                                        <td>{{$publication->author_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Publication title</th>
                                        <td>{{$publication->publication_title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Publication company</th>
                                        <td>{{$publication->publication_company}}</td>
                                    <tr>
                                        <th scope="col">Publication company location</th>
                                        <td>{{$publication->publication_company_location}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Publication date</th>
                                        <td>{{$publication->published_date}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <h3 class="text-center">Training information not available</h3>
                        @endif
                        <div class="form-actions">
                            <a href="{{URL::to( '/user/role/'.$employee->id.'/edit')}}"
                               class="btn btn-primary"><i class="ft-edit-2"></i> Edit</a>
                            <a class="btn btn-warning mr-1" role="button" href="{{url('/user/role')}}">
                                <i class="ft-x"></i> Back
                            </a>
                        </div>

                    </div>

                    {{--Employee Research information--}}
                    <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                         aria-expanded="false">
                        @if(count($employee->employeeResearchInfo)>0)
                            @foreach($employee->employeeResearchInfo as $research)
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th scope="col">Organization name</th>
                                        <td>{{$research->organization_name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Research topic</th>
                                        <td>{{$research->topic}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Responsibilities</th>
                                        <td>{{$research->responsibility}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <h3 class="text-center">Research information not available</h3>
                        @endif
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
        <div class="card-content collapse show">
            <div class="card-body">


            </div>
        </div>
    </div>

@endsection
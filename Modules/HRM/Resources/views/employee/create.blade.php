@section("employee_create", 'active')

@extends('layouts.app')

@section('menu')
    @include('hrm::layouts.partials.menu')
@endsection
@section("content")
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add new employee </h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-underline nav-justified" id="tab-bottom-line-drag">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="activeIcon12" aria-expanded="true"><i class="la la-info"></i> General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-archive"></i> Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="education-tab" data-toggle="tab" href="#education"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-graduation-cap"></i> Education</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="training-tab" data-toggle="tab" href="#training"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-book"></i> Training</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" id="publication-tab" data-toggle="tab" href="#publication"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-paperclip"></i> Publication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="research-tab" data-toggle="tab" href="#research"
                           aria-controls="linkIcon12"
                           aria-expanded="false"><i class="la la-"></i> Research</a>
                    </li>


                </ul>
                <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active show" id="general"
                         aria-labelledby="general-tab"
                         aria-expanded="true">
                        <p>General Info</p>
                    </div>
                    <div class="tab-pane" id="personal" role="tabpanel" aria-labelledby="personal-tab"
                         aria-expanded="false">
                        <p>Personal Info</p>
                    </div>
                    <div class="tab-pane" id="dropdownOptIcon21" role="tabpanel"
                         aria-labelledby="dropdownOptIcon21-tab1"
                         aria-expanded="false">
                        <p>Fruitcake marshmallow donut wafer pastry chocolate topping
                            cake. Powder powder gummi bears jelly beans. Gingerbread
                            cake chocolate lollipop. Jelly oat cake pastry marshmallow
                            sesame snaps.</p>
                    </div>
                    <div class="tab-pane" id="education" role="tabpanel"
                         aria-labelledby="education-tab"
                         aria-expanded="false">
                        <p>Education</p>
                    </div>
                    <div class="tab-pane" id="training" role="tabpanel" aria-labelledby="training-tab"
                         aria-expanded="false">
                        <p>Training
                        </p>
                    </div>

                    <div class="tab-pane" id="publication" role="tabpanel" aria-labelledby="publication-tab"
                         aria-expanded="false">
                        <p>Publication
                        </p>
                    </div>

                    <div class="tab-pane" id="research" role="tabpanel" aria-labelledby="research-tab"
                         aria-expanded="false">
                        <p>Research
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
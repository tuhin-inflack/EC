<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="{{ url('hrm') }}"><i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.dashboard') </span></a>
                </li>

                <li class="{{ is_active_match('hrm/employee') }}">
                    <a href="{{ url('hrm/employee') }}">
                        <i class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('hrm::employee.menu_name')</span>
                    </a>
                </li>
                <li class="{{ is_active_match('hrm/department')}}">
                    <a href="{{ url('hrm/department') }}">
                        <i class="la la-list-alt"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">@lang('hrm::department.left_menu_title')</span>
                    </a>
                </li>
                <li class="{{ is_active_match('hrm/designation') }}">
                    <a href="{{ url('hrm/designation') }}">
                        <i class="la la-list-alt"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">@lang('hrm::designation.left_menu_title')</span>
                    </a>
                </li>

                <li class="{{ is_active_match('hrm/job') }}">
                    <a href="{{ url('hrm/job-circular') }}">
                        <i class="la la-file-o"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">@lang('hrm::job_circular.menu_name')</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-calendar"></i><span class="menu-title"
                                                                             data-i18n="nav.templates.main">{{ trans('hrm::employee.attendance') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_url('hrm/attendance') }}">
                            <a href="{{ route('employee-attendance.index') }}">
                                <i class="la la-list-ol"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::employee.attendance_list') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-calendar-times-o"></i><span class="menu-title"
                                                                                     data-i18n="nav.templates.main">{{ trans('hrm::leave.leave') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_url('hrm/leave') }}">
                            <a href="{{ route('employee-leave.apply') }}">
                                <i class="la la-hotel"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::leave.leave_application') }}</span>
                            </a>
                        </li>
                        <li class="{{ is_active_url('hrm/leave/list')}}">
                            <a href="{{ url('hrm/leave/list') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::leave.leave_list') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-money"></i><span class="menu-title"
                                                                          data-i18n="nav.templates.main">{{ trans('hrm::employee.employee_loan') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_url('hrm/loan') }}">
                            <a href="{{ route('employee-loan.apply') }}">
                                <i class="la la-hotel"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::employee.employee_loan_apply') }}</span>
                            </a>
                        </li>
                        {{--<li class="{{ is_active_url('hm/hostel-budget-section')}}">
                            <a href="{{ url('hm/hostel-budget-section') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{ trans('hm::hostel_budget.sub_menu_section') }}</span>
                            </a>
                        </li>--}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class=""><i class="la la-money"></i><span class="menu-title"
                                                                          data-i18n="nav.templates.main">{{ trans('hrm::employee.employee_training') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_url('hrm/training') }}">
                            <a href="{{ route('employee-training.apply') }}">
                                <i class="la la-hotel"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::employee.employee_training_apply') }}</span>
                            </a>
                        </li>
                        <li class="{{ is_active_match('hrm/training/list')}}">
                            <a href="{{  route('employee-training.list') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">{{ trans('hrm::employee.trainee_card_title') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- House Rent Options -->
                <li class="nav-item">
                    <a href="#" class=""><i class="la la-hotel"></i><span class="menu-title"
                                                                          data-i18n="nav.templates.main">House Rent</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_match('house-rent/circulate-house') }}">
                            <a href="{{ url('hrm/house-rent/circulate-house') }}">
                                <i class="la la-institution"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Circulate House</span>
                            </a>
                        </li>

                        <!-- This Should Only be visible to Employee -->
                        <li class="{{ is_active_url('house-rent/show-house')}}">
                            <a href="{{ url('hrm/house-rent/show-house') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Apply House Rent</span>
                            </a>
                        </li>

                        <li class="{{ is_active_url('house-rent/applications')}}">
                            <a href="{{ url('hrm/house-rent/applications') }}">
                                <i class="la ft-check"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">House Rent Request</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- / House Options -->


                <!-- Note Options -->
                <li class="nav-item">
                    <a href="#" class=""><i class="la la-hotel"></i><span class="menu-title"
                                                                          data-i18n="nav.templates.main">Notes</span></a>
                    <!-- This Should Only be visible to Employee -->
                    <ul class="menu-content">
                        <li class="{{ is_active_match('notes/create') }}">
                            <a href="{{ url('hrm/notes/create') }}">
                                <i class="la la-institution"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Create Note</span>
                            </a>
                        </li>

                        <!-- This Should Only be visible to Employee -->
                        <li class="{{ is_active_url('notes')}}">
                            <a href="{{ url('hrm/notes') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">My Notes</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- / Note Options -->

                <!-- Appraisal  Options -->
                <li class="nav-item">
                    <a href="#" class=""><i class="la la-hotel"></i><span class="menu-title"
                                                                          data-i18n="nav.templates.main">Appraisal</span></a>
                    <!-- This Should Only be visible to Employee -->
                    <ul class="menu-content">
                        <li class="{{ is_active_match('appraisal/create') }}">
                            <a href="{{ url('hrm/appraisal/create') }}">
                                <i class="la la-institution"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Appraisal Form</span>
                            </a>
                        </li>

                        <!-- This Should Only be visible to Employee -->
                        <li class="{{ is_active_url('retirement')}}">
                            <a href="{{ url('hrm/retirement') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Retirement Form</span>
                            </a>
                        </li>


                        <li class="{{ is_active_url('notes')}}">
                            <a href="{{ url('hrm/notes') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title"
                                      data-i18n="nav.dash.main">Promotion</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- / Appraisal Options -->

            </ul>
        @endauth
    </div>
</div>

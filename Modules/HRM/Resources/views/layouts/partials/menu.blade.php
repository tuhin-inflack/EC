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
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('hrm::department.left_menu_title')</span>
                    </a>
                </li>
                <li class="{{ is_active_match('hrm/designation') }}">
                    <a href="{{ url('hrm/designation') }}">
                        <i class="la la-list-alt"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('hrm::designation.left_menu_title')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class=""><i class="la la-calendar-times-o"></i><span class="menu-title" data-i18n="nav.templates.main">{{ trans('hrm::leave.leave') }}</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active_match('hm/hostel-budget') }}">
                            <a href="{{ route('employee-leave.apply') }}">
                                <i class="la la-hotel"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">{{ trans('hrm::leave.leave_application') }}</span>
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
            </ul>
        @endauth
    </div>
</div>

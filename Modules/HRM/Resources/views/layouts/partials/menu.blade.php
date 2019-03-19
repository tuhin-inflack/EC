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
                <li class="{{ is_active_match('hrm/job') }}">
                    <a href="{{ url('hrm/job-circular') }}">
                        <i class="la la-file-o"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Job Circular</span>
                    </a>
                </li>
            </ul>
        @endauth
    </div>
</div>

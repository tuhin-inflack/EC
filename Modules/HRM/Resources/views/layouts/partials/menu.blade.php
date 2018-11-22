<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="{{ url('hrm') }}"><i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Dashboard </span></a>
                </li>
                <li class=" nav-item">
                    <a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.navbars.main">Employee</span></a>
                    <ul class="menu-content">

                        <li class="{{ is_active_url('hrm/employee/create') }}">
                            <a href="{{ url('hrm/employee/create') }}">
                                <i class="la la-user-plus"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Add New Employee</span>
                            </a>
                        </li>

                        <li class="{{ is_active_url('hrm/employee') }}">
                            <a href="{{ url('hrm/employee') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Employee</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.navbars.main">Departments</span></a>
                    <ul class="menu-content">

                        <li class="{{ is_active_url('hrm/department/create') }}">
                            <a href="{{ url('hrm/department/create') }}">
                                <i class="la la-user-plus"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Add New Department</span>
                            </a>
                        </li>

                        <li class="{{ is_active_url('hrm/department') }}">
                            <a href="{{ url('hrm/department') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Department</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        @endauth
    </div>
</div>

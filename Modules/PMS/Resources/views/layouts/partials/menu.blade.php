<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="{{ url('pms') }}"><i class="la la-home"></i><span class="menu-title"
                                                                               data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title"
                                                                                  data-i18n="nav.navbars.main">Project Proposal</span></a>
                    <ul class="menu-content">

                        <li class="nav-item @yield('proposal_create')">
                            <a href="{{ route('project_request.create') }}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Create Project Proposal</span>
                            </a>
                        </li>

                        <li class="nav-item @yield('request_list')">
                            <a href="{{ route('project_request.index') }}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Project Proposal Request</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        @endauth
    </div>
</div>

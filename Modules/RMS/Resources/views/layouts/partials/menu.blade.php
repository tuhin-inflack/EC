<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="{{ url('rms') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.navbars.main">Request Research Proposal</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('research-request.create')}}">
                            <a href="{{route('research-request.create')}}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Create Request</span>
                            </a>
                        </li>
                        <li class="{{is_active_route('research-request.index')}}">
                            <a href="{{route('research-request.index')}}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Proposal Request</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.navbars.main">Submission Research Proposal</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('research-proposal-submission.create')}}">
                            <a href="{{route('research-proposal-submission.create')}}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Create Proposal</span>
                            </a>
                        </li>
                        <li class="{{is_active_route('research-proposal-submission.index')}}">
                            <a href="{{route('research-proposal-submission.index')}}">
                                <i class="la la-list-alt"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Proposal Request</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title" data-i18n="nav.navbars.main">Submitted Research Proposal</span></a>
                    <ul class="menu-content">
                        <li class="{{is_active_route('research-proposal-submitted.index')}}">
                            <a href="{{route('research-proposal-submitted.index')}}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">List of Submitted Proposals</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endauth
    </div>
</div>
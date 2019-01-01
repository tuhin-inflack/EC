<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="{{ url('tms') }}"><i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('labels.dashboard')}} </span></a>
                </li>

                <li class="{{ is_active_match('tms/employee') }}">
                    <a href="{{ url('tms/training') }}">
                    <i class="la la-list-alt"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('tms::training.menu_title')}}</span>
                    </a>
                </li>
                <li class="{{ is_active_match('tms/department')}}">
                    <a href="{{ url('tms/trainee') }}">
                        <i class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{trans('tms::training.trainee')}}</span>
                    </a>
                </li>

            </ul>
        @endauth
    </div>
</div>

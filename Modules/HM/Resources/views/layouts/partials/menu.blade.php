<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="{{ is_active_route('hm') }}">
                <a href="{{ route('hm') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.dashboard')</span></a>
            </li>
            <li class="{{ is_active_route('booking-requests.index') }}">
                <a href="{{ route('booking-requests.index') }}">
                    <i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::booking-request.booking_request')</span></a>
            </li>
            <li class="{{ is_active_route('check-in.index') }}">
                <a href="{{ route('check-in.index') }}">
                    <i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::booking-request.check_in')</span></a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-cog la-spin"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('labels.setup')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('hostels.index') }}">
                        <a href="{{ route('hostels.index') }}">
                            <i class="la la-building"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::hostel.menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('room-types*') }}">
                        <a href="{{ route('room-types.index') }}">
                            <i class="la la-hotel"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::roomtype.menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Hostel</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('hostels.index') }}"><a href="{{ route('hostels.index') }}">
                            <i class="la la-list"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">List</span></a>
                    </li>
                    <li class="{{ is_active_route('hostels.create') }}"><a href="{{ route('hostels.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="#">
                    <i class="la la-money"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Hostel Budget</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('hostel-budgets.create') }}"><a href="{{ route('hostel-budgets.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-money"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Annual Purchase</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('annual-purchases.create') }}"><a href="{{ route('annual-purchases.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-shopping-cart"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Store</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('stores.create') }}"><a href="{{ route('stores.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
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
            <li class="nav-item">
                <a href="#">
                    <i class="la la-hotel"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Room</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('rooms.index') }}"><a href="{{ route('rooms.index') }}">
                        <i class="la la-list"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">List</span></a>
                    </li>
                    <li class="{{ is_active_route('rooms.create') }}"><a href="{{ route('rooms.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-hotel"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Room Type</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('room-types.create') }}"><a href="{{ route('room-types.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Inventory Type</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-types.create') }}"><a href="{{ route('inventory-types.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Inventory Item</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-items.create') }}"><a href="{{ route('inventory-items.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Booking</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('bookings.create') }}"><a href="{{ route('bookings.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

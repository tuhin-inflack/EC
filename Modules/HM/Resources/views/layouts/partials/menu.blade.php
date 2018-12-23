<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ is_active_route('hm') }}">
                <a href="{{ route('hm') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.dashboard')</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class=""><i class="la la-money"></i><span class="menu-title"
                                                                      data-i18n="nav.templates.main">{{ trans('hm::hostel_budget.menu_title') }}</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_match('hm/hostel-budget') }}">
                        <a href="{{ url('hm/hostel-budgets') }}">
                            <i class="la la-hotel"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">{{ trans('hm::hostel_budget.sub_menu_budget') }}</span>
                        </a>
                    </li>
                    <li class="{{ is_active_url('hm/hostel-budget-section')}}">
                        <a href="{{ url('hm/hostel-budget-section') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">{{ trans('hm::hostel_budget.sub_menu_section') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-money"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Annual Purchase</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('annual-purchases.create') }}"><a
                                href="{{ route('annual-purchases.create') }}">
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
            <li class="{{ is_active_route('hostels.index') }}"><a href="{{ route('hostels.index') }}">
                    <i class="la la-building"></i>
                    <span class="menu-title"
                          data-i18n="nav.dash.main">@lang('hm::hostel.menu_title')</span></a>
            </li>

            <li class="{{ is_active_route('room-types*') }}">
                <a href="{{ route('room-types.index') }}">
                    <i class="la la-hotel"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::roomtype.menu_title')</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Inventory Type</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-types.create') }}"><a
                                href="{{ route('inventory-types.create') }}">
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
                    <li class="{{ is_active_route('inventory-items.create') }}"><a
                                href="{{ route('inventory-items.create') }}">
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
                          data-i18n="nav.templates.main">@lang('hm::booking-request.menu_title')</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('booking-requests.index') }}"><a href="{{ route('booking-requests.index') }}">
                            <i class="la la-list"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">@lang('labels.list')</span></a>
                    </li>
                    <li class="{{ is_active_route('booking-requests.create') }}"><a href="{{ route('booking-requests.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">@lang('hm::booking-request.create')</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title"
                          data-i18n="nav.templates.main">Booking Rate</span></a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('booking-rates.create') }}"><a
                                href="{{ route('booking-request-rates.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">Create</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-book"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">Check-in</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('check-in.create') }}">
                        <a href="{{ route('check-in.create') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">New</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('check-in.index') }}">
                        <a href="{{ route('check-in.index') }}">
                            <i class="la la-list"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-money"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('hm::hostel.bill')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('bill.search-check-in') }}">
                        <a href="{{ route('bill.search-check-in') }}">
                            <i class="la la-plus"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::hostel.bill_generate')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('bill.index') }}">
                        <a href="{{ route('bill.index') }}">
                            <i class="la la-list"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('hm::hostel.bill_list')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('bill.payment-list') }}">
                        <a href="{{ route('bill.payment-list') }}">
                            <i class="la la-list"></i>
                            <span class="menu-title"
                                  data-i18n="nav.dash.main">@lang('hm::hostel.bill_payment_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="{{ is_active_route('inventory') }}">
                <a href="{{ route('inventory') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.dashboard')</span></a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::inventory.inventory_request')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-request.create') }}">
                        <a href="{{ route('inventory-request.create') }}">
                            <i class="la la-plus-circle"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.new') @lang('ims::inventory.inventory_request')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('inventory-request.index') }}">
                        <a href="{{ route('inventory-request.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.inventory_request') @lang('labels.list')</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Inventory -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::inventory.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory.list') }}">
                        <a href="{{ route('inventory.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.list_menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('inventory.add') }}">
                        <a href="{{ route('inventory.add') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.add_menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Inventory -->

            <!-- Inventory Item Category -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::inventory.inventory_item_category')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-item-category.index') }}">
                        <a href="{{ route('inventory-item-category.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.item_category_list')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('inventory-item-category.departmental-item-categories') }}">
                        <a href="{{ route('inventory-item-category.departmental-item-categories') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.departmental_item_category_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Inventory Item Category -->

            <!-- Inventory Location -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::location.location')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory-locations.index') }}">
                        <a href="{{ route('inventory-locations.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::location.location_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Location -->

            <!-- Vendor -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::vendor.vendor')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('vendor.index') }}">
                        <a href="{{ route('vendor.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::vendor.vendor_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Vendor -->

            <!-- Auction -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::auction.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('auction.add') }}">
                        <a href="{{ route('auction.create') }}">
                            <i class="la la-plus-circle"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::auction.add_menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('auction.index') }}">
                        <a href="{{ route('auction.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::auction.list_menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- // Auction -->

            <!-- Auction Sales-->
            <li class="{{ is_active_route('auctions.sales.create') }}">
                <a href="{{ route('auctions.sales.create') }}">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::auction.auction_sales')</span>
                </a>
            </li>
            <!-- // Auction Sales-->

        </ul>
    </div>
</div>
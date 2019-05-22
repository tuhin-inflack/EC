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
                    <i class="la la-puzzle-piece"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::product.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory.product.index') }}">
                        <a href="{{ route('inventory.product.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::product.list_menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('inventory.product.transfer') }}">
                        <a href="{{ route('inventory.product.transfer') }}">
                            <i class="la la-exchange"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::product.transfer_menu_title')</span>
                        </a>
                    </li>
                </ul>
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

            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::warehouse.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('inventory.warehouse.list') }}">
                        <a href="{{ route('inventory.warehouse.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::warehouse.list_menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('inventory.warehouse.create') }}">
                        <a href="{{ route('inventory.warehouse.create') }}">
                            <i class="la la-plus-circle"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::warehouse.create_menu_title')</span>
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
                    <li class="{{ is_active_route('inventory.list.by.warehouse') }}">
                        <a href="{{ route('inventory.list.by.warehouse') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.warehouse.list_menu_title')</span>
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
                </ul>
            </li>
            <!-- //Inventory Item Category -->

            <!-- Location -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::location.location')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('location.index') }}">
                        <a href="{{ route('location.index') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::location.location_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Location -->

            <!-- Fixed Asset -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::fixed-asset.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('fixed-asset.add') }}">
                        <a href="{{ route('fixed-asset.add') }}">
                            <i class="la la-plus-circle"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::fixed-asset.add_menu_title')</span>
                        </a>
                    </li>

                    <li class="{{ is_active_route('fixed-asset.list') }}">
                        <a href="{{ route('fixed-asset.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::fixed-asset.list_menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Fixed Asset -->

            <!-- Asset Management-->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::asset.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('asset.list') }}">
                        <a href="{{ route('asset.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::asset.list_menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- // Asset Management-->

            <!-- Auction -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-building"></i>
                    <span class="menu-title" data-i18n="nav.templates.main">@lang('ims::auction.title')</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ is_active_route('auction.add') }}">
                        <a href="{{ route('auction.add') }}">
                            <i class="la la-plus-circle"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::auction.add_menu_title')</span>
                        </a>
                    </li>
                    <li class="{{ is_active_route('auction.list') }}">
                        <a href="{{ route('auction.list') }}">
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
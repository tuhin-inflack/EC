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
                    <li class="{{ is_active_route('inventory.create') }}">
                        <a href="{{ route('inventory.create') }}">
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
                    <li class="{{ is_active_route('inventory-item-category.list') }}">
                        <a href="{{ route('inventory-item-category.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::inventory.item_category_list')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- //Inventory Item Category -->

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
                    {{--<li class="{{ is_active_route('asset.add') }}">--}}

                        {{--<a href="{{ route('asset.add') }}">--}}
                            {{--<i class="la la-plus-circle"></i>--}}
                            {{--<span class="menu-title" data-i18n="nav.dash.main">@lang('ims::asset.add_menu_title')</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="{{ is_active_route('asset.list') }}">
                        <a href="{{ route('asset.list') }}">
                            <i class="la la-list-alt"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">@lang('ims::asset.list_menu_title')</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- // Asset Management-->

        </ul>
    </div>
</div>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ is_active_route('accounts') }}">
                    <a href="{{ route('accounts') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('labels.dashboard')</span></a>
                </li>
                {{--<li class="{{ is_active_route('chart-of-account') }}">--}}
                    {{--<a href="{{ route('chart-of-account') }}">--}}
                        {{--<i class="la la-bars"></i>--}}
                        {{--<span class="menu-title" data-i18n="nav.dash.main">Char of Account</span></a>--}}
                {{--</li>--}}
                <li class="{{ is_active_route('economy-code.index') }}">
                    <a href="{{ route('economy-code.index') }}">
                        <i class="la la-tags"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('accounts::economy-code.title')</span></a>
                </li>
                <li class="{{ is_active_route('economy-head.index') }}">
                    <a href="{{ route('economy-head.index') }}">
                        <i class="la la-tag"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('accounts::economy-head.title')</span></a>
                </li>
                <li class="{{ is_active_route('fiscal-year.index') }}">
                    <a href="{{ route('fiscal-year.index') }}">
                        <i class="la la-calendar-o"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">@lang('accounts::fiscal-year.title')</span></a>
                </li>
            </ul>
        @endauth
    </div>
</div>

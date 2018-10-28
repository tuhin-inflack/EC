<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ is_active_route('accounts') }}">
                    <a href="{{ route('accounts') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class="{{ is_active_route('accounts.chart-of-account') }}">
                    <a href="{{ route('accounts.chart-of-account') }}">
                        <i class="la la-bars"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Char of Account</span></a>
                </li>
                <li class=" nav-item">
                    <a href="#">
                        <i class="la la-folder-o"></i>
                        <span class="menu-title" data-i18n="nav.navbars.main">Account Head</span>
                    </a>
                    <ul class="menu-content">

                        <li class="{{ is_active_route('account-head.create') }}">
                            <a href="{{ route('account-head.create') }}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Create Account Head</span></a>
                        </li>

                        <li class="{{ is_active_route('account-head.index') }}">
                            <a href="{{ route('account-head.index') }}">
                                <i class="la la-list"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Account Head</span></a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="#">
                        <i class="la la-files-o"></i>
                        <span class="menu-title" data-i18n="nav.navbars.main">Account Ledger</span>
                    </a>
                    <ul class="menu-content">

                        <li class="{{ is_active_route('account-ledger.create') }}">
                            <a href="{{ route('account-ledger.create') }}">
                                <i class="la la-plus-circle"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Create Account Ledger</span></a>
                        </li>
                        <li class="{{ is_active_route('account-ledger.index') }}">
                            <a href="{{ route('account-ledger.index') }}">
                                <i class="la la-list"></i>
                                <span class="menu-title" data-i18n="nav.dash.main">Account Ledger</span></a>
                        </li>

                    </ul>
                </li>
            </ul>
        @endauth
    </div>
</div>

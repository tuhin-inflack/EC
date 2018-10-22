<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="{{ route('accounts') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class=" nav-item">
                    <a href="{{ url('accounts/account-head') }}">
                        <i class="la la-tag"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Account Head</span></a>
                </li>
                <li class=" nav-item">
                    <a href="{{ url('accounts/account-ledger') }}">
                        <i class="la la-tags"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Account Ledger</span></a>
                </li>
            </ul>
        @endauth
    </div>
</div>

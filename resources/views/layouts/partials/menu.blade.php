<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        @auth
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="{{ route('home') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Dashboard</span></a>
                </li>
                <li class=" nav-item">
                    <a href="{{ url('/user/role') }}">
                        <i class="la la-home"></i>
                        <span class="menu-title"
                              data-i18n="nav.dash.main">Role Management</span></a>
                </li>
            </ul>
        @endauth
    </div>
</div>

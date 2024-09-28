<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand" href="/home"><span class="text-primary">One</span>-Health</a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item dropdown" id="admin_nav">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown" style="left: 991px;right: auto;top: 100%">
                    <a class="dropdown-item" id="profile_nav" href="{{ route('profile.show') }}">{{ __('usersHome.profile') }}</a>
                    <a class="dropdown-item" id="logout_nav" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('usersHome.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

            <!-- Language Switcher -->
            <li class="nav-item dropdown" id="lang_nav">
                <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('usersHome.language') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="langDropdown">
                    <a class="dropdown-item" id="ar_nav" href="{{ route('changeLang', ['locale' => 'ar']) }}">العربية</a>
                    <a class="dropdown-item" id="en_nav" href="{{ route('changeLang', ['locale' => 'en']) }}">English</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>

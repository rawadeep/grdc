<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-success">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo text-light" href="{{ route('dashboard') }}">
                <x-application-logo />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
                <img src="{{ asset('img/small-logo.png') }}" alt="Logo" class="logo img-fluid">
            </a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    Logged In as <span class="nav-profile-name">{{ get_phrase(auth()->user()->name ?? '') }}</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center {{ session('language') == 'english' ? 'btn-active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <h6 class="date mb-0">English Dashboard</h6>
                </a>
            </li>
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center {{ session('language') == 'nepali' ? 'btn-active' : '' }}"
                    href="{{ route('nepali.dashboard') }}">
                    <h6 class="date mb-0">Nepali Dashboard</h6>
                </a>
            </li>
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center {{ session('language') == 'tamang' ? 'btn-active' : '' }}"
                    href="{{ route('tamang.dashboard') }}">
                    <h6 class="date mb-0">Tamang Dashboard</h6>
                </a>
            </li>
            @if (session('language') == 'en')
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">{{ get_phrase('Today') }} : {{ date('M d') }}</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                    id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="typcn typcn-cog-outline mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">
                    <a href="{{ route(session('language') == 'english' ? 'settings.create' : 'nepali.settings.create') }}"
                        class="dropdown-item">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        {{ get_phrase('Settings') }}
                    </a>
                    {{-- <a href="{{ route(session('language') == 'en' ? 'dashboard' : 'nepali.dashboard') }}"
                        class="dropdown-item">
                        <button type="button" class="btn btn-secondary btn-sm btn-icon-text">
                            <i class="typcn typcn-cog btn-icon-prepend"></i>
                            {{ get_phrase(session('language') == 'en' ? 'Nepali' : 'English') }}
                            {{ get_phrase('Admin') }}
                        </button>
                    </a> --}}
                    {{-- <a href="{{ route(session('language') == 'en' ? 'settings.index' : 'ne.settings.index') }}"
                        class="dropdown-item">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        Settings (Admin)
                    </a> --}}
                    <a href="{{ route('languages.index') }}" class="dropdown-item">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        {{ get_phrase('Languages') }} ({{ get_phrase('Admin') }})
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item">
                        <button type="button" class="btn btn-primary btn-sm btn-icon-text">
                            <i class="typcn typcn-eject btn-icon-prepend"></i>
                            {{ get_phrase('Logout') }}
                        </button>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
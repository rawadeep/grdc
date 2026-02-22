<nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    <div class="navbar-links-wrapper d-flex align-items-stretch">
        <div class="nav-link">
            <a title="Manage Users" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
            </a>
        </div>

        <div class="nav-link">
            <a title="Add new User" href="{{ route('users.create') }}">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>
        <div class="nav-link">
            <a title="Settings"
                href="{{ route(session('language') == 'en' ? 'settings.create' : 'ne.settings.create') }}"><i
                    class="typcn typcn-cog-outline"></i></a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-search d-none d-md-block mr-0">
                <a href="{{ url('/') }}">
                    <button type="button" class="btn btn-light btn-sm btn-icon-text">
                        <i class="typcn typcn-home btn-icon-prepend"></i>
                        {{ get_phrase('Website') }}
                    </button>
                </a>
            </li>
            <li class="nav-item nav-search d-none d-md-block mr-0">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <button type="button" class="btn btn-primary btn-sm btn-icon-text">
                        <i class="typcn typcn-eject btn-icon-prepend"></i>
                        {{ get_phrase('Logout') }}
                    </button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Route::is(prefixed_route('dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route(prefixed_route('dashboard')) }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Dashboard') }}</span>
            </a>
        </li>
        @if (session('language') == 'english')
        <li class="nav-item {{ Route::is('sliders.*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#sliders"
                aria-expanded="{{ Route::is('sliders.*') ? 'true' : 'false' }}" aria-controls="error">
                <i class="typcn typcn-image-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Sliders') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('sliders.*') ? 'show' : '' }}" id="sliders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sliders.index') }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sliders.create') }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>
        @endif

        <li class="nav-item {{ Route::is(prefixed_route('pages.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#pages"
                aria-expanded="{{ Route::is(prefixed_route('pages.*')) ? 'true' : 'false' }}" aria-controls="error">
                <i class="typcn typcn-clipboard menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Pages') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('pages.*')) ? 'show' : '' }}" id="pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('pages.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('pages.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('sections.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#sections"
                aria-expanded="{{ Route::is('sections.*') ? 'true' : 'false' }}" aria-controls="error">
                <i class="typcn typcn-flow-merge menu-icon"></i>
                <span class="menu-title">{{ get_phrase('sections') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('sections.*')) ? 'show' : '' }}" id="sections">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('sections.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('sections.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        @if (session('language') == 'english')
        <li class="nav-item {{ Route::is('media.*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#media"
                aria-expanded="{{ Route::is('media.*') ? 'true' : 'false' }}" aria-controls="error">
                <i class=" typcn typcn-image menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Media') }} {{ get_phrase('Gallery') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('media.*') ? 'show' : '' }}" id="media">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('media.index') }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('media.create') }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>
        @endif

        <li class="nav-item {{ Route::is(prefixed_route('project-descriptions.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#project-descriptions"
                aria-expanded="{{ Route::is('project-descriptions.*') ? 'true' : 'false' }}" aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Project') }} {{ get_phrase('Descriptions') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('project-descriptions.*')) ? 'show' : '' }}"
                id="project-descriptions">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-descriptions.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-descriptions.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('project-objectives.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#project-objectives"
                aria-expanded="{{ Route::is(prefixed_route('project-objectives.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Project') }} {{ get_phrase('Objectives') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('project-objectives.*')) ? 'show' : '' }}"
                id="project-objectives">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-objectives.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-objectives.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('project-components.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#project-components"
                aria-expanded="{{ Route::is(prefixed_route('project-components.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Project') }} {{ get_phrase('Components') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('project-components.*')) ? 'show' : '' }}"
                id="project-components">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-components.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-components.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('case-study-categories.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#case-study-categories"
                aria-expanded="{{ Route::is(prefixed_route('case-study-categories.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Case Study') }} {{ get_phrase('Categories') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('case-study-categories.*')) ? 'show' : '' }}"
                id="case-study-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('case-study-categories.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('case-study-categories.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('case-studies.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#case-studies"
                aria-expanded="{{ Route::is(prefixed_route('case-studies.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Case Studies') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('case-studies.*')) ? 'show' : '' }}" id="case-studies">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('case-studies.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('case-studies.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('project-resources.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#project-resources"
                aria-expanded="{{ Route::is(prefixed_route('project-resources.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Resources') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('project-resources.*')) ? 'show' : '' }}"
                id="project-resources">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-resources.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-resources.index')) }}?type=1">
                            {{ get_phrase('Reports') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-resources.index')) }}?type=2">
                            {{ get_phrase('Data & Analytics') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('project-resources.index')) }}?type=3">
                            {{ get_phrase('Knowledge Products') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('publication-categories.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#publication-categories"
                aria-expanded="{{ Route::is(prefixed_route('publication-categories.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Publication') }} {{ get_phrase('Categories') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('publication-categories.*')) ? 'show' : '' }}"
                id="publication-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('publication-categories.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('publication-categories.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('publications.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#publications"
                aria-expanded="{{ Route::is(prefixed_route('publications.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Publications') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('publications.*')) ? 'show' : '' }}" id="publications">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('publications.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('publications.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('events.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#events"
                aria-expanded="{{ Route::is(prefixed_route('events.*')) ? 'true' : 'false' }}" aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Events') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('events.*')) ? 'show' : '' }}" id="events">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('events.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('events.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('notices.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#notices"
                aria-expanded="{{ Route::is(prefixed_route('notices.*')) ? 'true' : 'false' }}" aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Notices') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('notices.*')) ? 'show' : '' }}" id="notices">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('notices.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route(prefixed_route('notices.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Route::is(prefixed_route('media-coverage.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#media-coverage"
                aria-expanded="{{ Route::is(prefixed_route('media-coverage.*')) ? 'true' : 'false' }}"
                aria-controls="error">
                <i class=" typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Media Coverage') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is(prefixed_route('media-coverage.*')) ? 'show' : '' }}" id="media-coverage">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('media-coverage.index')) }}">
                            {{ get_phrase('Manage') }} </a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route(prefixed_route('media-coverage.create')) }}">
                            {{ get_phrase('Create') }} </a></li>
                </ul>
            </div>
        </li>

        @if (session('language') == 'english')
        <li class="nav-item {{ Route::is('grievances.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('grievances.index') }}">
                <i class="typcn typcn-messages menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Grievances') }}</span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('contact-messages.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact-messages.index') }}">
                <i class="typcn typcn-messages menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Contact Messages') }}</span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('backup.database') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('backup.database') }}">
                <i class="typcn typcn-cloud-storage menu-icon"></i>
                <span class="menu-title">{{ get_phrase('Backup Database') }}</span>
            </a>
        </li>
        @endif

    </ul>
</nav>
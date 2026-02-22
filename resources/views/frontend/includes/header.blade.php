@php
$query = session('language') == 'nepali' ? App\Models\Nepali\Page::query() : ( session('language') == 'tamang' ?
App\Models\Tamang\Page::query() : App\Models\Backend\Page::query() );
$pages = $query->where('showOnMenu', 1)
->where('parent', 0)
->orderBy('ord', 'asc')
->take(6)
->get();

$icons = ['fa-home', 'fa-info-circle', 'fa-folder', 'fa-file', 'fa-file-alt'];
@endphp
<header class="header" id="header">
    <div class="nav-container">
        <nav>
            <ul class="nav-menu" id="navMenu">
                <!-- Mobile Close Button -->
                <li class="nav-item mobile-close-item" style="display: none;">
                    <button class="mobile-close" id="mobileCloseBtn" aria-label="Close Menu" style="background: none; border: none; font-size: 2rem; color: #fff; padding: 0.5rem 1rem; cursor: pointer;">
                        <i class="fas fa-times"></i>
                    </button>
                </li>
                @foreach ($pages as $k => $page)
                @php
                $subpages = $page->subpages();
                @endphp
                <li class="nav-item">
                    <a href="{{ $subpages->count() > 0 ? '#' : ($k == 0 ? url('/') : url($page->slug)) }}"
                        class="nav-link">
                        @if (isset($icons[$k]))
                        <i class="fas {{ $icons[$k] }}"></i>
                        @else
                        <svg style="margin-right: 0.25rem;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 32 32">
                            <g fill="currentColor">
                                <path
                                    d="M14.534 9.266h.007c.228 0 .446-.09.599-.247L19.83 4.2a.713.713 0 0 0-.058-1.06a.85.85 0 0 0-1.14.054L14.55 7.387l-1.174-1.246a.85.85 0 0 0-1.14-.07a.714.714 0 0 0-.075 1.058l1.771 1.881a.84.84 0 0 0 .602.256m10.269 16.611c0 .78.68 1.413 1.521 1.413s1.522-.633 1.522-1.413v-7.915c0-.78-.681-1.413-1.522-1.413c-.84 0-1.522.632-1.522 1.413z" />
                                <path
                                    d="M11.962 1.5c-.933 0-1.847.647-1.847 1.625V5H4.288C2.543 5 1 6.33 1 8.125V29a2 2 0 0 0 2 2h26a2 2 0 0 0 2-2V8.125C31 6.33 29.457 5 27.712 5h-5.759V3.125c0-.978-.914-1.625-1.846-1.625zm-.847 1.625c0-.265.291-.625.846-.625h8.146c.556 0 .846.36.846.625V10.5h-9.838zM21.953 7h5.759C28.494 7 29 7.572 29 8.125v5.846H3V8.125C3 7.572 3.506 7 4.288 7h5.827v2.582c-.526.167-.906.63-.906 1.176c0 .686.6 1.242 1.338 1.242h10.906c.74 0 1.338-.556 1.338-1.242c0-.521-.347-.968-.838-1.152zM3 16h26v13H3z" />
                            </g>
                        </svg>
                        @endif
                        <span>{{ $page->title }}</span>
                    </a>
                    @if($subpages->count() > 0)
                    <div class="dropdown">
                        @foreach ($page->subpages() as $item)
                        <a href="{{ url($item->slug) }}" class="dropdown-link" data-en="Project Description">{{
                            $item->title }}</a>
                        @endforeach
                    </div>
                    @endif
                </li>
                @endforeach
                <li class="nav-item language-dropdown">
                    <button class="language-btn" id="languageBtn">
                        <i class="fas fa-globe"></i>
                        <span id="currentLang">{{ ucfirst(session('language', 'english')) }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="language-options" id="languageOptions">
                        <a href="{{ url('/') }}?language=english"
                            class="language-option {{ session('language') == 'english' ? 'active' : '' }}"
                            data-lang="english">
                            <i class="fas fa-flag"></i> English
                        </a>
                        <a href="{{ url('/') }}?language=nepali"
                            class="language-option {{ session('language') == 'nepali' ? 'active' : '' }}"
                            data-lang="nepali">
                            <i class="fas fa-flag"></i> नेपाली
                        </a>
                        <a href="{{ url('/') }}?language=tamang"
                            class="language-option {{ session('language') == 'tamang' ? 'active' : '' }}"
                            data-lang="tamang">
                            <i class="fas fa-flag"></i> तमाङ
                        </a>
                    </div>
                </li>
                <li class="nav-item search-dropdown">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <button class="search-btn" id="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="search-options" id="searchOptions">
                            <input type="text" class="search-input" name="s" id="searchInput" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>
        </nav>
        <button class="mobile-toggle" id="mobileToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>
@push('scripts')
<script>
    // Show close button only on mobile
    function toggleMobileCloseBtn() {
        const closeItem = document.querySelector('.mobile-close-item');
        if (window.innerWidth <= 768) {
            closeItem.style.display = 'block';
        } else {
            closeItem.style.display = 'none';
        }
    }
    window.addEventListener('resize', toggleMobileCloseBtn);
    document.addEventListener('DOMContentLoaded', toggleMobileCloseBtn);

    // Close menu on close button click
    document.addEventListener('DOMContentLoaded', function() {
        const closeBtn = document.getElementById('mobileCloseBtn');
        const navMenu = document.getElementById('navMenu');
        if (closeBtn && navMenu) {
            closeBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                navMenu.classList.remove('active');
            });
        }
    });
</script>
@endpush
@push('styles')
<style>

</style>
@endpush
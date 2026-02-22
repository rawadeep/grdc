@php
    $menu = [
        ['label' => 'About Us', 'path' => '/about-us'],
        ['label' => 'Team', 'children' => [
            ['label' => 'Governance Council', 'path' => '/team/governance-council'],
            ['label' => 'Personnel', 'path' => '/team/personnel'],
            ['label' => 'Expert/Consultants', 'path' => '/team/experts-consultants'],
        ]],
        ['label' => 'Project', 'children' => [
            ['label' => 'Ongoing', 'path' => '/projects/ongoing'],
            ['label' => 'Completed', 'path' => '/projects/completed'],
        ]],
        ['label' => 'Publication', 'children' => [
            ['label' => 'Articles', 'path' => '/publications/articles'],
            ['label' => 'Reports', 'path' => '/publications/reports'],
            ['label' => 'Manuals & Guidelines', 'path' => '/publications/manuals-guidelines'],
            ['label' => 'Photo Gallery', 'path' => '/publications/photo-gallery'],
        ]],
        ['label' => 'Events/Career', 'children' => [
            ['label' => 'Upcoming', 'path' => '/events-career/upcoming'],
            ['label' => 'Completed', 'path' => '/events-career/completed'],
            ['label' => 'Vacancy', 'path' => '/events-career/vacancy'],
        ]],
        ['label' => 'Contact Us', 'path' => '/contact-us'],
    ];

    $templateMap = [
        'home' => 'home',
        'about-us' => 'about-us',
        'team/governance-council' => 'team-governance-council',
        'team/personnel' => 'team-personnel',
        'team/experts-consultants' => 'team-experts-consultants',
        'projects/ongoing' => 'projects-ongoing',
        'projects/completed' => 'projects-completed',
        'publications/articles' => 'publications-articles',
        'publications/reports' => 'publications-reports',
        'publications/manuals-guidelines' => 'publications-manuals-guidelines',
        'publications/photo-gallery' => 'publications-photo-gallery',
        'events-career/upcoming' => 'events-upcoming',
        'events-career/completed' => 'events-completed',
        'events-career/vacancy' => 'events-vacancy',
        'contact-us' => 'contact-us',
    ];

    $currentKey = $pageKey ?? 'home';
    $currentTemplate = $templateMap[$currentKey] ?? 'home';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Green Research & Development Center (GRDC)">
    <title>GRDC | Green Research & Development Center</title>
    <link rel="stylesheet" href="{{ asset('assets/grdc.css') }}?v={{ filemtime(public_path('assets/grdc.css')) }}">
</head>
<body>
    <div class="site-shell">
        <header>
            <div class="topbar">
                <div class="container split-between">
                    <span>Non Governmental Organization (NGO): Green Research & Development Center</span>
                    <span>Evidence | Partnership | Impact</span>
                </div>
            </div>
            <div class="navbar">
                <div class="container nav-wrap">
                    <a href="/" class="brand">
                        <span class="brand-badge">G</span>
                        <span class="brand-text">
                            <strong>GRDC</strong>
                            Green Research & Development Center
                        </span>
                    </a>
                    <button class="nav-toggle" id="nav-toggle" type="button">Menu</button>
                    <nav class="nav-menu" id="nav-menu">
                        <a href="/" class="{{ $currentKey === 'home' ? 'active' : '' }}">Home</a>
                        @foreach ($menu as $item)
                            <div class="nav-item {{ isset($item['children']) ? 'has-children' : '' }}">
                                @if (!isset($item['children']))
                                    <a href="{{ $item['path'] }}" class="{{ request()->is(ltrim($item['path'], '/')) ? 'active' : '' }}">{{ $item['label'] }}</a>
                                @else
                                    <a href="#">{{ $item['label'] }}</a>
                                    <div class="dropdown">
                                        @foreach ($item['children'] as $child)
                                            <a href="{{ $child['path'] }}" class="{{ request()->is(ltrim($child['path'], '/')) ? 'active' : '' }}">{{ $child['label'] }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </nav>
                </div>
            </div>
        </header>

        <main class="container page page-{{ str_replace(['/', '-'], '_', $currentKey) }}">
            @includeIf('grdc.pages.' . $currentTemplate)
        </main>

        <footer class="footer">
            <div class="container split-between">
                <p>&copy; {{ now()->year }} GRDC. All rights reserved.</p>
                <div class="footer-links">
                    <a href="/about-us">About</a>
                    <a href="/projects/ongoing">Projects</a>
                    <a href="/publications/reports">Reports</a>
                    <a href="/events-career/upcoming">Events</a>
                    <a href="/contact-us">Contact</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const toggle = document.getElementById('nav-toggle');
        const menu = document.getElementById('nav-menu');
        const mobileQuery = window.matchMedia('(max-width: 860px)');

        if (menu) {
            menu.classList.remove('show');
            menu.querySelectorAll('.nav-item.open').forEach(function (item) {
                item.classList.remove('open');
            });
        }

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                menu.classList.toggle('show');
            });
        }

        if (menu) {
            const parentItems = menu.querySelectorAll('.nav-item.has-children > a');
            parentItems.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    if (!mobileQuery.matches) {
                        return;
                    }

                    event.preventDefault();
                    const item = link.parentElement;
                    const willOpen = !item.classList.contains('open');
                    menu.querySelectorAll('.nav-item.open').forEach(function (openItem) {
                        openItem.classList.remove('open');
                    });
                    if (willOpen) {
                        item.classList.add('open');
                    }
                });
            });
        }

        const slider = document.getElementById('home-slider');
        if (slider) {
            const slides = Array.from(slider.querySelectorAll('.slide'));
            const dots = Array.from(slider.querySelectorAll('.dot'));
            const prevBtn = slider.querySelector('[data-dir="prev"]');
            const nextBtn = slider.querySelector('[data-dir="next"]');
            let index = 0;
            let intervalId = null;

            const renderSlide = function (nextIndex) {
                index = (nextIndex + slides.length) % slides.length;
                slides.forEach(function (slide, i) {
                    slide.classList.toggle('active', i === index);
                });
                dots.forEach(function (dot, i) {
                    dot.classList.toggle('active', i === index);
                });
            };

            const startAuto = function () {
                intervalId = setInterval(function () {
                    renderSlide(index + 1);
                }, 6000);
            };

            const resetAuto = function () {
                if (intervalId) {
                    clearInterval(intervalId);
                }
                startAuto();
            };

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    renderSlide(index - 1);
                    resetAuto();
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    renderSlide(index + 1);
                    resetAuto();
                });
            }
            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    const target = parseInt(dot.getAttribute('data-slide'), 10);
                    if (Number.isInteger(target)) {
                        renderSlide(target);
                        resetAuto();
                    }
                });
            });

            startAuto();
        }
    </script>
</body>
</html>

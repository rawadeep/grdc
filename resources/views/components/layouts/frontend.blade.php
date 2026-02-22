<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaWRiN Project - Managing Watersheds for Enhanced Resilience</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        .page-content {
            display: block;
        }

        .page-content img {
            width: 100%;
        }
    </style>
</head>

<body class="mawrin">
    <!-- Top Navigation -->
    @include('frontend.includes.top-nav')
    <!-- Header -->
    @include('frontend.includes.header')

    {{ $slot }}

    <!-- Footer -->
    @include('frontend.includes.footer')

    <script>
        // ============================================================================
        // HERO SLIDER IMPLEMENTATION
        // ============================================================================

        class HeroSlider {
            constructor() {
                this.slides = document.querySelectorAll('.hero-slide');
                this.dots = document.querySelectorAll('.hero-dot');
                this.prevBtn = document.getElementById('prevSlide');
                this.nextBtn = document.getElementById('nextSlide');
                this.currentSlide = 0;
                this.slideInterval = null;
                this.autoPlayDelay = 5000; // 5 seconds
                
                this.init();
            }
            
            init() {
                if (this.slides.length === 0) return;
                
                // Add event listeners
                this.prevBtn?.addEventListener('click', () => this.prevSlide());
                this.nextBtn?.addEventListener('click', () => this.nextSlide());
                
                // Add dot navigation
                this.dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => this.goToSlide(index));
                });
                
                // Start autoplay
                this.startAutoPlay();
                
                // Pause on hover
                const heroSection = document.querySelector('.hero');
                heroSection?.addEventListener('mouseenter', () => this.stopAutoPlay());
                heroSection?.addEventListener('mouseleave', () => this.startAutoPlay());
                
                // Handle keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') this.prevSlide();
                    if (e.key === 'ArrowRight') this.nextSlide();
                });
                
                // Touch/swipe support
                this.addTouchSupport();
            }
            
            goToSlide(index) {
                // Remove active class from current slide and dot
                this.slides[this.currentSlide]?.classList.remove('active');
                this.dots[this.currentSlide]?.classList.remove('active');
                
                // Update current slide index
                this.currentSlide = index;
                
                // Add active class to new slide and dot
                this.slides[this.currentSlide]?.classList.add('active');
                this.dots[this.currentSlide]?.classList.add('active');
                
                // Restart autoplay
                this.restartAutoPlay();
            }
            
            nextSlide() {
                const nextIndex = (this.currentSlide + 1) % this.slides.length;
                this.goToSlide(nextIndex);
            }
            
            prevSlide() {
                const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.goToSlide(prevIndex);
            }
            
            startAutoPlay() {
                this.slideInterval = setInterval(() => {
                    this.nextSlide();
                }, this.autoPlayDelay);
            }
            
            stopAutoPlay() {
                if (this.slideInterval) {
                    clearInterval(this.slideInterval);
                    this.slideInterval = null;
                }
            }
            
            restartAutoPlay() {
                this.stopAutoPlay();
                this.startAutoPlay();
            }
            
            addTouchSupport() {
                let startX = 0;
                let endX = 0;
                const heroSection = document.querySelector('.hero');
                
                if (!heroSection) return;
                
                heroSection.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                }, { passive: true });
                
                heroSection.addEventListener('touchend', (e) => {
                    endX = e.changedTouches[0].clientX;
                    this.handleSwipe();
                }, { passive: true });
                
                heroSection.addEventListener('touchmove', (e) => {
                    // Prevent default to avoid scrolling while swiping
                    if (Math.abs(e.touches[0].clientX - startX) > 10) {
                        e.preventDefault();
                    }
                });
            }
            
            handleSwipe() {
                const swipeThreshold = 50;
                const swipeDistance = endX - startX;
                
                if (Math.abs(swipeDistance) > swipeThreshold) {
                    if (swipeDistance > 0) {
                        this.prevSlide(); // Swipe right - go to previous
                    } else {
                        this.nextSlide(); // Swipe left - go to next
                    }
                }
            }
        }

        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Fade In Animation on Scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Search Functionality
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const searchResults = document.getElementById('searchResults');
        const resultsList = document.getElementById('resultsList');

        // Sample search data
        const searchData = [
            { title: 'Project Progress Report Q1 2025', type: 'Report', description: 'Quarterly progress update on project activities and milestones.' },
            { title: 'Climate Vulnerability Assessment', type: 'Publication', description: 'Comprehensive assessment of climate vulnerabilities in the project area.' },
            { title: 'Community Engagement Guidelines', type: 'Resource', description: 'Best practices for engaging with local and indigenous communities.' },
            { title: 'Watershed Management Toolkit', type: 'Resource', description: 'Technical toolkit for watershed management and restoration activities.' },
            { title: 'Monitoring and Evaluation Framework', type: 'Report', description: 'Framework for tracking project progress and impact measurement.' }
        ];

        function performSearch() {
            const query = searchInput.value.toLowerCase().trim();
            if (query.length < 2) {
                searchResults.style.display = 'none';
                return;
            }

            const results = searchData.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.description.toLowerCase().includes(query) ||
                item.type.toLowerCase().includes(query)
            );

            if (results.length > 0) {
                resultsList.innerHTML = results.map(result => `
                    <div class="knowledge-card" style="margin-bottom: 1rem;">
                        <div class="knowledge-body">
                            <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">${result.title}</h4>
                            <p style="color: var(--accent-color); font-size: 0.9rem; margin-bottom: 0.5rem;">${result.type}</p>
                            <p style="margin-bottom: 1rem;">${result.description}</p>
                            <a href="#" class="download-btn">
                                <i class="fas fa-download"></i>
                                Access Resource
                            </a>
                        </div>
                    </div>
                `).join('');
                searchResults.style.display = 'block';
            } else {
                resultsList.innerHTML = '<p style="text-align: center; color: var(--text-light);">No results found. Try different keywords.</p>';
                searchResults.style.display = 'block';
            }
        }

        searchBtn.addEventListener('click', performSearch);
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        // Dynamic Content Loading Simulation
        function loadDynamicContent() {
            // Simulate loading of dynamic content like latest reports, events, etc.
            // In real implementation, this would fetch data from a backend API
            console.log('Dynamic content loaded');
        }

        // Initialize dynamic content on page load
        document.addEventListener('DOMContentLoaded', loadDynamicContent);

        // Auto-hide mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav-container')) {
                navMenu.classList.remove('active');
            }
        });

        // Performance optimization: Lazy load images when implemented
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            // Apply to future image elements with data-src attribute
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        class MapSlider {
            constructor() {
                this.slides = document.querySelectorAll('.map-slide');
                this.dots = document.querySelectorAll('.map-dot');
                this.currentSlide = 0;
                this.init();
            }

            init() {
                if (this.slides.length === 0) return;

                // Add dot click listeners
                this.dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => this.goToSlide(index));
                });

                // Auto slide every 6 seconds
                this.startAutoPlay();
            }

            goToSlide(index) {
                // Remove active from current
                this.slides[this.currentSlide]?.classList.remove('active');
                this.dots[this.currentSlide]?.classList.remove('active');

                // Set new slide
                this.currentSlide = index;

                // Add active to new
                this.slides[this.currentSlide]?.classList.add('active');
                this.dots[this.currentSlide]?.classList.add('active');
            }

            nextSlide() {
                const nextIndex = (this.currentSlide + 1) % this.slides.length;
                this.goToSlide(nextIndex);
            }

            startAutoPlay() {
                setInterval(() => {
                    this.nextSlide();
                }, 6000); // Change every 6 seconds
            }
        }

        // Initialize sliders and mobile navigation on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', () => {
            new HeroSlider(); // Slider init
            new MapSlider(); // Map slider init

            // Mobile Navigation Toggle
            const mobileToggle = document.getElementById('mobileToggle');
            const navMenu = document.getElementById('navMenu');

            if (mobileToggle && navMenu) {
                mobileToggle.addEventListener('click', () => {
                    navMenu.classList.toggle('active');
                });

                // Optional: Close menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.nav-container') && navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                    }
                });
            }
        });
    </script>

    <script>
        //=============================================================================
        // Publications type toggle
        //=============================================================================

        function filterCategory(category) {
            const cards = document.querySelectorAll('#publicationsGrid .knowledge-card');
            cards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

    @stack('scripts')

</body>
</html>
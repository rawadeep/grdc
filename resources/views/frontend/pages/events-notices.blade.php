<x-layouts.frontend>
    <main>
        <!-- Events and Notices Section -->
        <section class="section" id="events" style="background: var(--bg-light);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $page->title }}</h2>
                    <p class="section-subtitle">
                        {{ $page->description ?? 'Stay updated with the latest events, notices, and media coverage
                        related to the MaWRiN project.' }}
                    </p>
                </div>

                <div class="knowledge-grid">
                    <!-- Upcoming Events Card -->
                    <div class="knowledge-card fade-in">
                        <div class="knowledge-header">
                            <i class="fas fa-calendar-alt" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Upcoming Events</h3>
                        </div>
                        <div class="knowledge-body">
                            <!-- Event Item -->
                            @forelse ($events as $item)
                            <div
                                style="border-left: 3px solid var(--accent-color); padding-left: 1rem; margin-bottom: 1rem;">
                                <h4 style="color: var(--primary-color);">{{ $item->title }}</h4>
                                <p><i class="fas fa-calendar"></i> {{ date('M d, Y', strtotime($item->date)) }}</p>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $item->location }}</p>
                            </div>
                            @empty
                            <p>No events available at the moment.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Latest Notices Card -->
                    <div class="knowledge-card fade-in">
                        <div class="knowledge-header">
                            <i class="fas fa-bullhorn" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>Latest Notices</h3>
                        </div>
                        <div class="knowledge-body">
                            <!-- Notice Item -->
                            @forelse ($notices as $item)
                            <div
                                style="border-left: 3px solid var(--accent-color); padding-left: 1rem; margin-bottom: 1rem;">
                                <h4 style="color: var(--primary-color);">{{ $item->title }}</h4>
                                <p><small>{{ date_formatter($item->published_at) }}</small></p>
                                <p>{{ $item->short_description }}</p>
                                <a href="{{ route('notice.single', $item->slug) }}" class="download-btn">View More</a>
                            </div>
                            @empty
                            <p>No notices available at the moment.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Media Coverage Section -->
        @if ($mediaCoverages->isNotEmpty())
        <section class="media-coverage-section" id="media-coverage">
            <div class="media-container">
                <div class="media-header">
                    <h2 class="section-title">Media Coverage</h2>
                    <p class="section-subtitle">Coverage of MaWRiN Project in various national and local media outlets.
                    </p>
                </div>

                <div class="media-cards-grid">

                    <!-- Media Card 1 -->
                    @foreach ($mediaCoverages as $item)
                    <div class="media-card">
                        <a href="{{ route('media.coverage.single', $item->slug) }}">
                            <img src="{{ get_image('uploads/media-coverage/optimized/' . $item->featured_image) }}"
                                alt="Media Coverage Image" class="media-image">
                            <div class="media-details">
                                <h3 class="media-title">{{ $item->title }}</h3>
                                <p class="media-description">{{ $item->short_description }}</p>
                                <p class="media-date"><strong>Date:</strong> {{ date_formatter($item->published_at) }}
                                </p>
                                <p class="media-source"><strong>Published in:</strong> {{ $item->source }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        @else
        <section class="media-coverage-section" id="media-coverage">
            <div class="media-container">
                <div class="media-header">
                    <h2 class="section-title">Media Coverage</h2>
                    <p class="section-subtitle">Coverage of MaWRiN Project in various national and local media outlets.
                    </p>
                </div>

                <div class="media-cards-grid">

                    <!-- Media Card 1 -->
                    <div class="media-card">
                        <img src="{{ asset('frontend/theme/img/1.jpg') }}" alt="Media Coverage Image"
                            class="media-image">
                        <div class="media-details">
                            <h3 class="media-title">Community-Led Watershed Restoration Gains Momentum</h3>
                            <p class="media-description">Local communities, supported by the MaWRiN Project, are leading
                                watershed restoration efforts across Sindhuli District.</p>
                            <p class="media-date"><strong>Date:</strong> June 5, 2025</p>
                            <p class="media-source"><strong>Published in:</strong> Khabarhub</p>
                        </div>
                    </div>

                    <!-- Media Card 2 -->
                    <div class="media-card">
                        <img src="{{ asset('frontend/theme/img/2.jpg') }}" alt="Media Coverage Image"
                            class="media-image">
                        <div class="media-details">
                            <h3 class="media-title">MaWRiN Showcases Climate Adaptation Success at National Summit</h3>
                            <p class="media-description">The project was featured as a model for climate resilience
                                during the recent National Climate Adaptation Forum.</p>
                            <p class="media-date"><strong>Date:</strong> May 28, 2025</p>
                            <p class="media-source"><strong>Published in:</strong> OnlineKhabar</p>
                        </div>
                    </div>

                    <!-- Media Card 3 -->
                    <div class="media-card">
                        <img src="{{ asset('frontend/theme/img/3.jpg') }}" alt="Media Coverage Image"
                            class="media-image">
                        <div class="media-details">
                            <h3 class="media-title">Workshop Empowers Women in Watershed Management</h3>
                            <p class="media-description">A recent training session focused on gender inclusion in
                                natural resource management under the MaWRiN framework.</p>
                            <p class="media-date"><strong>Date:</strong> May 15, 2025</p>
                            <p class="media-source"><strong>Published in:</strong> Rajdhani Samachar</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif

    </main>
</x-layouts.frontend>
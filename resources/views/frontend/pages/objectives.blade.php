<x-layouts.frontend>
    <main>
        <!-- Objectives Section -->
        <section class="section" id="objectives">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Project {{ $page->title ?? 'Objectives' }}</h2>
                    <p class="section-subtitle">{{ $page->description }}</p>
                </div>
                @if ($rows->count() > 0)
                <div class="description-grid">
                    @foreach ($rows as $item)
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="{{ $item->icon ?? 'fas fa-globe-asia' }}"></i></div>
                        <h4 class="card-title">{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Objectives Grid -->
                <div class="description-grid">
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-seedling"></i></div>
                        <h4 class="card-title">Enhance Climate Resilience</h4>
                        <p>To strengthen the capacity of local communities and ecosystems to adapt to climate change
                            impacts such as erratic rainfall, droughts, and land degradation through nature-based
                            solutions.</p>
                    </div>

                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-leaf"></i></div>
                        <h4 class="card-title">Promote Sustainable Watershed Management</h4>
                        <p>To implement integrated watershed management practices that improve water availability, soil
                            health, and biodiversity conservation in vulnerable areas of Sindhuli District.</p>
                    </div>

                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-users"></i></div>
                        <h4 class="card-title">Empower Local Communities</h4>
                        <p>To build the capacity of local institutions and stakeholders to lead climate adaptation
                            efforts, ensuring inclusive participation of women, youth, and marginalized groups.</p>
                    </div>

                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-chart-line"></i></div>
                        <h4 class="card-title">Strengthen Policy and Institutional Frameworks</h4>
                        <p>To support provincial and local governments in mainstreaming climate adaptation and disaster
                            risk reduction into policies, plans, and budgeting processes.</p>
                    </div>

                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-book-open"></i></div>
                        <h4 class="card-title">Knowledge Sharing and Learning</h4>
                        <p>To document and disseminate best practices, lessons learned, and innovative approaches for
                            replication across similar ecological zones and regions.</p>
                    </div>

                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-handshake"></i></div>
                        <h4 class="card-title">Foster Multi-Stakeholder Collaboration</h4>
                        <p>To facilitate partnerships between government agencies, civil society organizations, private
                            sector actors, and local communities for coordinated climate action.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>
</x-layouts.frontend>
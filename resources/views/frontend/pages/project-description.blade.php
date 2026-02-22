<x-layouts.frontend>
    <main>
        <!-- Project Description Section -->
        <section class="section" id="project-description">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $page->title ?? 'Project Description' }}</h2>
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
                <div class="description-grid">
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-globe-asia"></i></div>
                        <h4 class="card-title">Overview</h4>
                        <p>The Managing Watersheds for Enhanced Resilience (MaWRiN) Project focuses on sustainable
                            watershed management practices to help local communities adapt to climate change impacts
                            such as erratic rainfall patterns, water scarcity, and land degradation.</p>
                    </div>
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-handshake"></i></div>
                        <h4 class="card-title">Collaboration & Stakeholders</h4>
                        <p>Implemented by WWF Nepal in partnership with provincial and local governments, civil society
                            organizations, and community-based institutions, the project emphasizes multi-stakeholder
                            collaboration to ensure inclusive and sustainable outcomes.</p>
                    </div>
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-seedling"></i></div>
                        <h4 class="card-title">Nature-Based Solutions</h4>
                        <p>The project promotes Nature-Based Solutions (NbS), including reforestation, soil
                            conservation, rainwater harvesting, and agroforestry systems, to enhance ecosystem services
                            and build long-term resilience in vulnerable communities.</p>
                    </div>
                    <div class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-chart-pie"></i></div>
                        <h4 class="card-title">Monitoring & Evaluation</h4>
                        <p>A robust M&E system has been established to track progress, document lessons learned, and
                            scale up successful interventions across similar ecosystems and communities in Nepal.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>
</x-layouts.frontend>
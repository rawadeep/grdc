<x-layouts.frontend>
    <main>
        <!-- Publications Section -->
        <section class="section" id="publications">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Publications</h2>
                    <p class="section-subtitle">
                        {{ $page->description ?? 'Explore our collection of reports, policy briefs, research papers, and
                        case studies related to
                        climate adaptation, watershed management, and community resilience.' }}
                    </p>
                </div>

                <!-- Category Filters -->
                <div class="filter-buttons"
                    style="text-align: center; margin-bottom: 2rem; display: flex; justify-content: center; flex-wrap: wrap;">
                    <button class="cta-button" onclick="filterCategory('all')"
                        style="margin-right: 0.5rem;">All</button>
                    @foreach ($categories as $item)
                    <button class="cta-button" onclick="filterCategory('{{ $item->slug }}')"
                        style="margin-right: 0.5rem;">{{ $item->title }}</button>
                    @endforeach
                </div>

                <!-- Publications Grid -->
                <div class="knowledge-grid" id="publicationsGrid">
                    <!-- Sample Publication Cards -->
                    @foreach ($publications as $item)
                    <div class="knowledge-card fade-in" data-category="{{ $item->category->slug }}">
                        <div class="knowledge-header">
                            <i class="{{ $item->icon }}" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>{{ $item->title }}</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>{{ $item->description }}</p>
                            <a href="{{ asset('uploads/publications/' . $item->file_path) }}" class="download-btn">
                                <i class="fas fa-download"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>
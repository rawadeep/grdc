<x-layouts.frontend>
    <main>
        <!-- Reports Section -->
        <section class="section" id="reports">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $page->title }}</h2>
                    <p class="section-subtitle">
                        {{ $page->description ?? 'Explore our comprehensive collection of reports, evaluations, and case
                        studies related to the MaWRiN Project. These documents provide valuable insights into project
                        implementation, achievements, and lessons learned.' }}
                    </p>
                </div>

                <!-- Reports Grid -->
                <div class="knowledge-grid">
                    <!-- Report Card 1 -->
                    @foreach ($resources as $item)
                    <div class="knowledge-card fade-in">
                        <div class="knowledge-header">
                            <i class="{{ $item->icon }}" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <h3>{{ $item->title }}</h3>
                        </div>
                        <div class="knowledge-body">
                            <p>{{ $item->description }}</p>
                            <a href="{{ asset('uploads/resources/' . $item->file_path) }}" class="download-btn">
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
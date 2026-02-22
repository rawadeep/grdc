<x-layouts.frontend>
    <main>
        <!-- Components Section -->
        <section class="section" id="components">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Project {{ $page->title ?? 'Components' }}</h2>
                    <p class="section-subtitle">
                        {{ $page->description ?? '' }}
                    </p>
                </div>
                @if( $rows->count() > 0 )
                <div class="description-grid">
                    @foreach ($rows as $k => $item)
                    <a href="{{ route('component.single', 'component-' . $k+1) }}" class="description-card fade-in">
                        <div class="card-icon"><i class="{{ $item->icon ?? 'fas fa-cogs' }}"></i></div>
                        <h4 class="card-title">Component {{ $k+1 }}: {{ $item->title }}</h4>
                        <p>{{ $item->short_description }}</p>
                    </a>
                    @endforeach
                </div>
                @else
                <!-- Components Grid -->
                <div class="description-grid">
                    <a href="{{ route('component.single', 'component-1') }}" class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-cogs"></i></div>
                        <h4 class="card-title">Component 1: Enabling Environment for Mainstreaming Climate Change</h4>
                        <p>This component focuses on mainstreaming climate change adaptation into local governance
                            systems by building capacity at municipal levels and establishing multi-stakeholder
                            platforms for coordinated action.</p>
                    </a>

                    <a href="{{ route('component.single', 'component-2') }}" class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-leaf"></i></div>
                        <h4 class="card-title">Component 2: Enhanced Resilience of Communities to Climate Change</h4>
                        <p>This component supports communities in adopting Nature-based Solutions (NbS) such as
                            reforestation, soil conservation, rainwater harvesting, and agroforestry to reduce climate
                            risks and strengthen local adaptive capacities.</p>
                    </a>

                    <a href="{{ route('component.single', 'component-3') }}" class="description-card fade-in">
                        <div class="card-icon"><i class="fas fa-chart-line"></i></div>
                        <h4 class="card-title">Component 3: Monitoring, Evaluation, and Knowledge Management</h4>
                        <p>This component ensures continuous learning and evidence-based decision-making through
                            monitoring, evaluation, documentation of best practices, and dissemination of lessons
                            learned for replication across similar ecosystems.</p>
                    </a>
                </div>
                @endif
            </div>
        </section>
    </main>
</x-layouts.frontend>
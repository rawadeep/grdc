<x-layouts.frontend>
    <main>
        <section class="section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $mediaCoverage->title }}</h2>
                    <p class="section-subtitle">{{ $mediaCoverage->short_description }}</p>
                </div>

                <div class="section-image">
                    <img src="{{ get_image('uploads/media-coverage/' . $mediaCoverage->featured_image) }}">
                </div>

                <div class="section-content mt-4">
                    {!! $mediaCoverage->content !!}
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>
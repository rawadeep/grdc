<x-layouts.frontend>
    <main>
        <section class="section" id="project-description">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $page->title }}</h2>
                    @if ($page->description)
                    <div class="section-subtitle">
                        {!! $page->description !!}
                    </div>
                    @endif
                    {!! $page->content !!}
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>
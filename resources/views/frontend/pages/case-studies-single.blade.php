<x-layouts.frontend>
    <main>
        <!-- Case Studies Section -->
        <section class="section" id="case-studies">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">{{ $caseStudy->title }}</h2>
                    <div class="page-content mt-4">
                        {!! $caseStudy->content !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.frontend>
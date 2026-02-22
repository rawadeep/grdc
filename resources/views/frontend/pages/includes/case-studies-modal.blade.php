<div class="modal-header">
    <h3><i class="{{ $caseStudyCategory->icon }}"></i> {{ $caseStudyCategory->title }}</h3>
    <button class="modal-close" onclick="closeModal()">&times;</button>
</div>
<div class="modal-body">
    <div class="case-study-list">
        @foreach ($rows as $item)
        <a href="{{ route('case.studies.single', $item->slug) }}" class="case-study-item">
            <h4>{{ $item->title }}</h4>
            <p>{{ excerpt($item->content) }}</p>
            <small>Updated: {{ date('M d, Y', strtotime($item->updated_at)) }}</small>
        </a>
        @endforeach
    </div>
</div>
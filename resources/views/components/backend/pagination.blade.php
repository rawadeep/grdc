@if ($rows->lastPage() > 1)
<ul class="pagination mt-3">
    @if ($rows->currentPage() != 1)
    <li class="page-item"><a href="{{ $rows->url(1) }}" class="page-link">{{ get_phrase('Previous') }}</a></li>
    @endif

    @for ($i = 1; $i <= $rows->lastPage(); $i++)
        <li class="page-item{{ $rows->currentPage() == $i ? ' active' : '' }}">
            <a href="{{ $rows->url($i) }}" class="page-link">{{ $i }}</a>
        </li>
        @endfor

        @if ($rows->currentPage() != $rows->lastPage())
        <li class="page-item"><a href="{{ $rows->url($rows->lastPage()) }}" class="page-link">{{ get_phrase('Next')
                }}</a></li>
        @endif
</ul>
@endif
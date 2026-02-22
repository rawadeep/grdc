@props(['title' => null, 'description' => null])
<div class="card">
    <div class="card-body">
        @if ($title)
        <h4 class="card-title">{{ $title }}</h4>
        @endif
        @if ($description)
        <p class="card-description">
            {{ $description }}
        </p>
        @endif
        {{ $slot }}
    </div>
</div>
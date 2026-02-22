<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('publication-categories.store')) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>

        </form>

    </x-backend.card>
</x-layouts.backend>
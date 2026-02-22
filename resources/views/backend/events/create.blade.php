<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('events.store')) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date" class="form-label">{{ get_phrase('Date') }}</label>
                        <x-backend.input.default type="date" name="date" required="required"
                            placeholder="{{ get_phrase('Date') }}" />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="location" class="form-label">{{ get_phrase('Location') }}</label>
                        <x-backend.input.default name="location" required="required"
                            placeholder="{{ get_phrase('Location') }}" />
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>

        </form>

    </x-backend.card>
</x-layouts.backend>
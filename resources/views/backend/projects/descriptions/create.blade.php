<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('project-descriptions.store')) }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                        <x-backend.input.default name="title" required="required"
                            placeholder="{{ get_phrase('Title') }}" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="order" class="form-label">{{ get_phrase('Order') }}</label>
                        <x-backend.input.default type="number" min="1" name="order" required="required"
                            placeholder="{{ get_phrase('Order') }}" value="{{ $maxOrder }}" />
                    </div>
                </div>
            </div>

            <x-backend.input.icon-picker />

            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" placeholder="{{ get_phrase('Description') }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>

        </form>

    </x-backend.card>
    @push('scripts')
    <script src="{{ asset('plugins/icon-picker.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconPicker = new FontAwesomeIconPicker(iconInput);
        });
    </script>
    @endpush
</x-layouts.backend>
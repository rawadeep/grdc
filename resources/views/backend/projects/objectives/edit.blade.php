<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route('project-objectives.update', $projectObjective->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                        <x-backend.input.default name="title" required="required"
                            placeholder="{{ get_phrase('Title') }}" value="{{ $projectObjective->title }}" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="order" class="form-label">{{ get_phrase('Order') }}</label>
                        <x-backend.input.default type="number" min="1" name="order" required="required"
                            placeholder="{{ get_phrase('Order') }}" value="{{ $projectObjective->ord }}" />
                    </div>
                </div>
            </div>

            <x-backend.input.icon-picker value="{{ $projectObjective->icon }}" />

            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" placeholder="{{ get_phrase('Description') }}"
                    value="{{ $projectObjective->description }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" />
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
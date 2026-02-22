<x-layouts.backend>
    <x-backend.card>

        <form action="{{ route(prefixed_route('case-study-categories.update'), $caseStudyCategory->id) }}"
            method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}"
                    value="{{ $caseStudyCategory->title }}" />
            </div>

            <x-backend.input.icon-picker value="{{ $caseStudyCategory->icon }}" />

            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" placeholder="{{ get_phrase('Description') }}"
                    value="{{ $caseStudyCategory->description }}" />
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
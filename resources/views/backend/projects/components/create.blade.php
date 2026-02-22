<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('project-components.store')) }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />
            </div>

            <x-backend.input.icon-picker />

            <div class="form-group">
                <label for="featured_image" class="form-label">{{ get_phrase('Featured Image') }}* ({{
                    get_phrase('Maximum Size')
                    }}:
                    {{ get_phrase('5') }} {{ get_phrase('MB') }}) </label>
                <x-backend.input.file name="featured_image" required="required" />
            </div>

            <div class="form-group">
                <label for="short_description" class="form-label">{{ get_phrase('Short Description') }}</label>
                <x-backend.input.textarea name="short_description"
                    placeholder="{{ get_phrase('Short Description') }}" />
            </div>

            <div class="form-group">
                <label for="content" class="form-label">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content" placeholder="{{ get_phrase('Content') }}" />
            </div>

            <div class="form-group">
                <h2 class="font-bold">{{ get_phrase("Project Framework") }}</h2>
            </div>

            <div class="form-group">
                <label for="project_framework_description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="project_framework_description" />
            </div>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Outcomes') }}</th>
                        <th>{{ get_phrase('Outputs') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <x-backend.input.default name="project_outcomes[]" required="required" />
                        </td>
                        <td>
                            <x-backend.input.default name="project_outputs[]" required="required" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <x-backend.input.default name="project_outcomes[]" />
                        </td>
                        <td>
                            <x-backend.input.default name="project_outputs[]" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <x-backend.input.default name="project_outcomes[]" />
                        </td>
                        <td>
                            <x-backend.input.default name="project_outputs[]" />
                        </td>
                    </tr>
                </tbody>
            </table>

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
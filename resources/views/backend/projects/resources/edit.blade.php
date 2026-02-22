<x-layouts.backend>
    <x-backend.card>

        <form action="{{ route(prefixed_route('project-resources.update'), $projectResource->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}*</label>
                <x-backend.input.default name="title" required="required" value="{{ $projectResource->title }}"
                    placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="type" class="form-label">{{ get_phrase('Resource Type') }}*</label>
                        <x-backend.input.select name="type" placeholder="{{ get_phrase('Resource Type') }}" required>
                            <option>Report</option>
                            <option {{ $projectResource->type == 'Data & Analytics' ? 'selected' : '' }}>Data &
                                Analytics</option>
                            <option {{ $projectResource->type == 'Knowledge Products' ? 'selected' : '' }}>Knowledge
                                Products</option>
                        </x-backend.input.select>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="file" class="form-label">{{ get_phrase('Update File') }} ({{ get_phrase('Maximum
                            Size') }}
                            {{ get_phrase("20MB") }})</label>
                        <x-backend.input.file type="file" name="file" placeholder="{{ get_phrase('File') }}" />
                    </div>
                </div>
            </div>

            <x-backend.input.icon-picker value="{{ $projectResource->icon }}" />

            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" value="{{ $projectResource->description }}"
                    placeholder="{{ get_phrase('Description') }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="Update" btn="info" />
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
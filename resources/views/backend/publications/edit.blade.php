<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('publications.update'), $publication->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}*</label>
                <x-backend.input.default name="title" required="required" value="{{ $publication->title }}"
                    placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="publication_category_id" class="form-label">{{ get_phrase('Category') }}*</label>
                        <x-backend.input.select name="publication_category_id"
                            placeholder="{{ get_phrase('Category') }}" required>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $publication->publication_category_id ?
                                'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
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

            <x-backend.input.icon-picker value="{{ $publication->icon }}" />

            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" value="{{ $publication->description }}"
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
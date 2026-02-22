<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route('media.update', $media->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name" class="form-label">{{ get_phrase('Name') }}</label>
                <x-backend.input.default name="name" required="required" value="{{ $media->name }}"
                    placeholder="{{ get_phrase('Name') }}" />
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="type" class="form-label">{{ get_phrase('Group') }}:</label>
                    <x-backend.input.select name="type" placeholder="{{ get_phrase('Group') }}">
                        <option value="Gallery">Gallery</option>
                        <option value="Project Area" {{ $media->type == 'Project Area' ? 'selected' : '' }}>Project Area
                        </option>
                    </x-backend.input.select>
                </div>
                <div class="col-md-8">
                    <label for="image" class="form-label">{{ get_phrase('Update Image') }}</label>
                    <x-backend.input.file name="image" />
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="Update" btn="info" />
            </div>
        </form>
    </x-backend.card>
</x-layouts.backend>
<x-layouts.backend>
    <x-backend.card>
        <form action="{{ route('languages.update', $language->id) }}?name={{ $name }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-2">
                    <label for="name" class="form-label">Name</label>
                    <x-backend.input.select name="name">
                        <option value="en">English</option>
                        <option value="ne" {{ $language->name == 'ne' ? 'selected' : '' }}>Nepali</option>
                        <option value="tmg" {{ $language->name == 'tmg' ? 'selected' : '' }}>Tamang</option>
                    </x-backend.input.select>
                </div>
                <div class="col-md-10">
                    <label for="key" class="form-label">Key</label>
                    <input type="text" name="key" class="form-control" value="{{ $language->key }}" disabled>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="value" class="form-label">Value</label>
                <x-backend.input.default name="value" value="{{ $language->value }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="Update" btn="info" />
            </div>
        </form>
    </x-backend.card>
</x-layouts.backend>
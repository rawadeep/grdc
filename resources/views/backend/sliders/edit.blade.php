<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}*</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}"
                    value="{{ $slider->title }}" />
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <img class="preview" src="{{ get_image('uploads/sliders/' . $slider->image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <label for="image" class="form-label">{{ get_phrase('Update Image') }} ({{ get_phrase('Minimum
                        Dimension') }}:
                        {{ get_phrase('1200') }}x{{ get_phrase('500') }}px)</label>
                    <x-backend.input.file name="image" />
                </div>
                <div class="col-md-2">
                    <label for="status">Status</label>
                    <x-backend.input.select name="status">
                        <option value="1">{{ get_phrase('Active') }}</option>
                        <option value="0" {{ !$slider->status ? 'selected' : '' }}>{{ get_phrase('In-Active') }}
                        </option>
                    </x-backend.input.select>
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="Update" btn="info" />
            </div>
        </form>
    </x-backend.card>

</x-layouts.backend>
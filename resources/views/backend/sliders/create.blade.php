<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}*</label>
                <x-backend.input.default name="title" required="required" value="{{ old('title') }}"
                    placeholder="{{ get_phrase('Title') }}" />
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="image" class="form-label">{{ get_phrase('Image') }}* ({{ get_phrase('Minimum Dimension')
                        }}:
                        {{ get_phrase('1200') }}x{{ get_phrase('500') }}px) </label>
                    <x-backend.input.file name="image" />
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>
        </form>
    </x-backend.card>

</x-layouts.backend>
<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('media-coverage.store')) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}*</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="form-group">
                <label for="featured_image" class="form-label">{{ get_phrase('Featured Image') }}*</label>
                <x-backend.input.file name="featured_image" required="required" />
            </div>

            <div class="form-group">
                <label for="short_description">{{ get_phrase('Short Description') }}*</label>
                <x-backend.input.textarea name="short_description" required="required"
                    placeholder="{{ get_phrase('Short Description') }}" />
            </div>

            <div class="form-group">
                <label for="content">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content" placeholder="{{ get_phrase('Content') }}" />
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="published_at">{{ get_phrase('Published At') }}*</label>
                        <x-backend.input.default name="published_at" type="date" required="required" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="source">{{ get_phrase('Media Source') }}*</label>
                        <x-backend.input.default name="source" placeholder="{{ get_phrase('Media Source') }}"
                            required="required" />
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>
        </form>
    </x-backend.card>

</x-layouts.backend>
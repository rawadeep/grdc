<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route(prefixed_route('notices.update'), $notice->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" value="{{ $notice->title }}"
                    placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="form-group">
                <label for="short_description" class="form-label">{{ get_phrase('Short') }} {{ get_phrase('Description')
                    }}</label>
                <x-backend.input.default name="short_description" value="{{ $notice->short_description }}"
                    placeholder="{{ get_phrase('Short') }} {{ get_phrase('Description') }}" />
            </div>

            <div class="form-group">
                <label for="content" class="form-label">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content" value="{{ $notice->content }}"
                    placeholder="{{ get_phrase('Write Notice Content') }}" />
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="published_at">{{ get_phrase('Published At') }}</label>
                        <x-backend.input.default type="date" name="published_at"
                            value="{{ $notice->published_at ?? now()->format('Y-m-d') }}" required="required" />
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" />
            </div>
        </form>
    </x-backend.card>
</x-layouts.backend>
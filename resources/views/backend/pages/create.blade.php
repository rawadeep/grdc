<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route(prefixed_route('pages.store')) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="showOnMenu">{{ get_phrase('Show On Menu') }}</label>
                    <x-backend.input.select name="showOnMenu">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </x-backend.input.select>
                </div>
                <div class="col-md-6">
                    <label for="roles" class="form-label">{{ get_phrase('Parent Page') }}
                        {{ get_phrase('if any') }}:</label>
                    <x-backend.input.select name="parent" placeholder="{{ get_phrase('Parent Page') }}">
                        <option value="0">{{ get_phrase('None') }}</option>
                        @foreach ($pages as $page)
                        <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </x-backend.input.select>
                </div>
                <div class="col-md-2">
                    <label for="number" class="form-label">{{ get_phrase('Order') }}</label>
                    <x-backend.input.default type="number" name="ord" required="required" value="{{ $maxOrder }}"
                        placeholder="{{ get_phrase('Order') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.default name="description"
                    placeholder="{{ get_phrase('Short') }} {{ get_phrase('Description') }}" />
            </div>
            <div class="form-group">
                <label for="content" class="form-label">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content"
                    placeholder="{{ get_phrase('Write Page Content') }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>
        </form>
    </x-backend.card>
</x-layouts.backend>
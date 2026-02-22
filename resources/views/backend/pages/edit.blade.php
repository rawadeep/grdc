<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route(prefixed_route('pages.update'), $page->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}"
                    value="{{ $page->title }}" />
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="showOnMenu">{{ get_phrase('Show On Menu') }}</label>
                    <x-backend.input.select name="showOnMenu">
                        <option value="0">No</option>
                        <option value="1" {{ $page->showOnMenu ? 'selected' : '' }}>Yes</option>
                    </x-backend.input.select>
                </div>
                <div class="col-md-6">
                    <label for="parent" class="form-label">{{ get_phrase('Parent Page') }}
                        {{ get_phrase('if any') }}:</label>
                    <x-backend.input.select name="parent" placeholder="{{ get_phrase('Parent Page') }}">
                        <option value="0">None</option>
                        @foreach ($pages as $parent)
                        <option value="{{ $parent->id }}" {{ $page->parent == $parent->id ? 'selected' : '' }}>
                            {{ $parent->title }}</option>
                        @endforeach
                    </x-backend.input.select>
                </div>
                <div class="col-md-2">
                    <label for="password" class="form-label">{{ get_phrase('Order') }}</label>
                    <x-backend.input.default type="number" name="ord" required="required" value="{{ $page->ord }}"
                        placeholder="{{ get_phrase('Order') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.default name="description" required="required"
                    placeholder="{{ get_phrase('Short') }} {{ get_phrase('Description') }}"
                    value="{{ $page->description }}" />
            </div>
            <div class="form-group">
                <label for="content" class="form-label">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content"
                    placeholder="{{ get_phrase('Write Page Content') }}" value="{{ $page->content }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" />
            </div>
        </form>
    </x-backend.card>
</x-layouts.backend>
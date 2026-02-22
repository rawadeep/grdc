<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route(prefixed_route('sections.update'), $section->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" value="{{ $section->title }}"
                    placeholder="{{ get_phrase('Title') }}" />
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="showOnFront" class="form-label">{{ get_phrase('Show On Front') }}</label>
                    <x-backend.input.select name="showOnFront" placeholder="{{ get_phrase('Show On Front') }}">
                        <option value="1" {{ $section->showOnFront == 1 ? 'selected' : '' }}>{{ get_phrase('Yes') }}
                        </option>
                        <option value="0" {{ $section->showOnFront == 0 ? 'selected' : '' }}>{{ get_phrase('No') }}
                        </option>
                    </x-backend.input.select>
                </div>
                <div class="col-md-3">
                    <label for="buttonTitle" class="form-label">{{ get_phrase('Button Title') }}</label>
                    <x-backend.input.default type="text" name="buttonTitle" value="{{ $section->buttonTitle }}"
                        placeholder="{{ get_phrase('Eg') }} {{ get_phrase('Learn More') }}" />
                </div>
                <div class="col-md-6">
                    <label for="linkTo" class="form-label">{{ get_phrase('Link to Page') }}
                        ({{ get_phrase('if any') }}):</label>
                    <x-backend.input.select name="linkTo" placeholder="{{ get_phrase('Link to Page') }}">
                        <option value="0">{{ get_phrase('None') }}</option>
                        @foreach ($pages as $page)
                        <option value="{{ $page->id }}" {{ $page->id == $section->linkTo ? 'selected' : '' }}>
                            {{ $page->title }}
                        </option>
                        @endforeach
                    </x-backend.input.select>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                <x-backend.input.textarea name="description" placeholder="{{ get_phrase('Write Section description') }}"
                    value="{{ $section->description }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" />
            </div>
        </form>
    </x-backend.card>

</x-layouts.backend>
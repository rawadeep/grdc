<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')
        <form action="{{ route(prefixed_route('sections.store')) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}" />

                <div class="form-group row mt-3">
                    <div class="col-md-2">
                        <label for="showOnFront" class="form-label">{{ get_phrase('Show On Front') }}</label>
                        <x-backend.input.select name="showOnFront" placeholder="{{ get_phrase('Show On Front') }}">
                            <option value="1" {{ old('showOnFront')==1 ? 'selected' : '' }}>{{ get_phrase('Yes') }}
                            </option>
                            <option value="0" {{ old('showOnFront')==0 ? 'selected' : '' }}>{{ get_phrase('No') }}
                            </option>
                        </x-backend.input.select>
                    </div>
                    <div class="col-md-3">
                        <label for="buttonTitle" class="form-label">{{ get_phrase('Button Title') }}</label>
                        <x-backend.input.default type="text" name="buttonTitle"
                            placeholder="{{ get_phrase('Eg') }}. {{ get_phrase('Learn More') }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="linkTo" class="form-label">{{ get_phrase('Link to Page') }}
                            ({{ get_phrase('if any') }}):</label>
                        <x-backend.input.select name="linkTo" placeholder="{{ get_phrase('Link to Page') }}">
                            <option value="0">{{ get_phrase('None') }}</option>
                            @foreach ($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </x-backend.input.select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">{{ get_phrase('Description') }}</label>
                    <x-backend.input.textarea name="description"
                        placeholder="{{ get_phrase('Write Section description') }}" />
                </div>

                <div class="mt-3">
                    <x-backend.input.submit-btn />
                </div>
        </form>
    </x-backend.card>

</x-layouts.backend>
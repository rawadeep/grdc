<x-layouts.backend>
    <x-backend.card>
        @include('errors.validation')

        <form action="{{ route(prefixed_route('case-studies.update'), $caseStudy->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="form-label">{{ get_phrase('Title') }}</label>
                <x-backend.input.default name="title" required="required" placeholder="{{ get_phrase('Title') }}"
                    value="{{ $caseStudy->title }}" />
            </div>

            <div class="form-group">
                <label for="case_study_category_id" class="form-label">{{ get_phrase('Category') }}:</label>
                <x-backend.input.select name="case_study_category_id" placeholder="{{ get_phrase('Category') }}">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $caseStudy->case_study_category_id == $category->id ?
                        'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </x-backend.input.select>
            </div>

            <div class="form-group">
                <label for="content" class="form-label">{{ get_phrase('Content') }}</label>
                <x-backend.input.textarea id="tinymce" name="content" placeholder="{{ get_phrase('Content') }}"
                    value="{{ $caseStudy->content }}" />
            </div>

            <div class="mt-3">
                <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" />
            </div>

        </form>

    </x-backend.card>
</x-layouts.backend>
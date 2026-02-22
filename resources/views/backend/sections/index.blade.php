<x-layouts.backend>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Section No') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Show On Front') }}</th>
                        <th>{{ get_phrase('Button Title') }}</th>
                        <th>{{ get_phrase('Link To') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sections as $section)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route(prefixed_route('sections.edit'), $section->id) }}" />
                        </td>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->title }}</td>
                        <td>{{ $section->showOnFront == 1 ? 'Yes' : 'No' }}</td>
                        <td>{{ $section->buttonTitle }}</td>
                        <td>
                            @if ($section?->page)
                            <a href="{{ url($section?->page?->slug) }}" target="_blank">View</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">{{ get_phrase('No data') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$sections" />
        </div>
    </x-backend.card>

</x-layouts.backend>
<x-layouts.backend>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Type') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Icon') }}</th>
                        <th>{{ get_phrase('Description') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $page)
                    <tr>
                        <td>
                            <x-backend.edit-btn
                                route="{{ route(prefixed_route('project-resources.edit'), $page->id) }}" />
                            <x-backend.delete-btn
                                action="{{ route(prefixed_route('project-resources.destroy'), $page->id) }}" />
                        </td>
                        <td>{{ $page->type }}</td>
                        <td>{{ $page->title }}</td>
                        <td><i class="{{ $page->icon }}"></i></td>
                        <td>{{ $page->description }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$rows" />
        </div>
    </x-backend.card>

</x-layouts.backend>
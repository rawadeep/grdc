<x-layouts.backend>
    <x-backend.add-btn href="{{ route(prefixed_route('publication-categories.create')) }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Publications') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $page)
                    <tr>
                        <td>
                            <x-backend.edit-btn
                                route="{{ route(prefixed_route('publication-categories.edit'), $page->id) }}" />
                            <x-backend.delete-btn
                                action="{{ route(prefixed_route('publication-categories.destroy'), $page->id) }}" />
                        </td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->publications->count() }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$rows" />
        </div>
    </x-backend.card>

</x-layouts.backend>
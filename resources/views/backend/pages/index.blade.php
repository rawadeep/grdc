<x-layouts.backend>
    <x-backend.add-btn href="{{ route(prefixed_route('pages.create')) }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('ID') }}</th>
                        <th>{{ get_phrase('Name') }}</th>
                        <th>{{ get_phrase('Parent') }}</th>
                        <th>{{ get_phrase('Order') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route(prefixed_route('pages.edit'), $page->id) }}" />
                            <x-backend.delete-btn action="{{ route(prefixed_route('pages.destroy'), $page->id) }}" />
                        </td>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->ofparent() ? $page->ofparent()->title : '-' }}</td>
                        <td>{{ $page->ord }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$pages" />
        </div>
    </x-backend.card>

</x-layouts.backend>
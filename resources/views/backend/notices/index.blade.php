<x-layouts.backend>
    <x-backend.add-btn href="{{ route(prefixed_route('notices.create')) }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Short Description') }}</th>
                        <th>{{ get_phrase('Published At') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $row)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route(prefixed_route('notices.edit'), $row->id) }}" />
                            <x-backend.delete-btn action="{{ route(prefixed_route('notices.destroy'), $row->id) }}" />
                        </td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->short_description }}</td>
                        <td>{{ $row->published_at }}</td>
                        <td>{{ date_formatter($row->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$rows" />
        </div>
    </x-backend.card>

</x-layouts.backend>
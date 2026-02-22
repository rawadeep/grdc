<x-layouts.backend>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Full Name') }}</th>
                        <th>{{ get_phrase('Email') }}</th>
                        <th>{{ get_phrase('Contact Number') }}</th>
                        <th>{{ get_phrase('Nature of Grievance') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                        <th>{{ get_phrase('Description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $k => $page)
                    <tr>
                        <td>
                            <x-backend.delete-btn action="{{ route('grievances.destroy', $page->id) }}" />
                        </td>
                        <td>{{ $page->full_name }}</td>
                        <td>{{ $page->email }}</td>
                        <td>{{ $page->contact_number }}</td>
                        <td>{{ $page->category }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
                        <td>{{ $page->description }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$rows" />
        </div>
    </x-backend.card>

</x-layouts.backend>
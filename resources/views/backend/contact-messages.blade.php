<x-layouts.backend>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('Full Name') }}</th>
                        <th>{{ get_phrase('Email Address') }}</th>
                        <th>{{ get_phrase('Organization') }}</th>
                        <th>{{ get_phrase('Subject') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                        <th>{{ get_phrase('Description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $k => $page)
                    <tr>
                        <td>
                            <x-backend.delete-btn action="{{ route('contact-messages.destroy', $page->id) }}" />
                        </td>
                        <td>{{ $page->full_name }}</td>
                        <td>{{ $page->email }}</td>
                        <td>{{ $page->organization }}</td>
                        <td>{{ $page->subject }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
                        <td>{{ $page->message }}</td>
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
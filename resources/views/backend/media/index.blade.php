<x-layouts.backend>
    <x-backend.add-btn href="{{ route('media.create') }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('IMG') }}</th>
                        <th>{{ get_phrase('Name') }}</th>
                        <th>{{ get_phrase('Type') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($media as $item)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route('media.edit', $item->id) }}" />
                            <x-backend.delete-btn action="{{ route('media.destroy', $item->id) }}" />
                        </td>
                        <td>
                            <img class="preview" src="{{ get_image('uploads/media/' . $item->filename) }}" width="120px"
                                alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ date_formatter($item->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$media" />
        </div>
    </x-backend.card>

</x-layouts.backend>
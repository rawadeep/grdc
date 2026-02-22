<x-layouts.backend>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Language</th>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languages as $item)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route('languages.edit', $item->id) }}" />
                            <x-backend.delete-btn action="{{ route('languages.destroy', $item->id) }}" />
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->key }}</td>
                        <td>{{ $item->value }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-backend.card>
</x-layouts.backend>
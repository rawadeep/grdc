<x-layouts.backend>
    <x-backend.add-btn href="{{ route(prefixed_route('media-coverage.create')) }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('IMG') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Source') }}</th>
                        <th>{{ get_phrase('Published At') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $item)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route(prefixed_route('media-coverage.edit'), $item->id) }}" />
                            <x-backend.delete-btn
                                action="{{ route(prefixed_route('media-coverage.destroy'), $item->id) }}" />
                        </td>
                        <td>
                            <img class="preview"
                                src="{{ get_image('uploads/media-coverage/optimized/' . $item->featured_image) }}"
                                style="width: 120px;" alt="">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->source }}</td>
                        <td>{{ date_formatter($item->published_at) }}</td>
                        <td>{{ date_formatter($item->updated_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$rows" />
        </div>
    </x-backend.card>

</x-layouts.backend>
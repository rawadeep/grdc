<x-layouts.backend>
    <x-backend.add-btn href="{{ route(prefixed_route('project-components.create')) }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('IMG') }}</th>
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
                                route="{{ route(prefixed_route('project-components.edit'), $page->id) }}" />
                            <x-backend.delete-btn
                                action="{{ route(prefixed_route('project-components.destroy'), $page->id) }}" />
                        </td>
                        <td>
                            <img class="preview" src="{{ get_image('uploads/components/' . $page->featured_image) }}"
                                width="120px" alt="">
                        </td>
                        <td>{{ $page->title }}</td>
                        <td><i class="{{ $page->icon }}"></i></td>
                        <td>{{ $page->short_description }}</td>
                        <td>{{ date_formatter($page->created_at, 2) }}</td>
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
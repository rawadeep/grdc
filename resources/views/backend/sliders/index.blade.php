<x-layouts.backend>
    <x-backend.add-btn href="{{ route('sliders.create') }}" />
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Actions') }}</th>
                        <th>{{ get_phrase('IMG') }}</th>
                        <th>{{ get_phrase('ID') }}</th>
                        <th>{{ get_phrase('Title') }}</th>
                        <th>{{ get_phrase('Status') }}</th>
                        <th>{{ get_phrase('At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sliders as $slider)
                    <tr>
                        <td>
                            <x-backend.edit-btn route="{{ route('sliders.edit', $slider->id) }}" />
                            <x-backend.delete-btn action="{{ route('sliders.destroy', $slider->id) }}" />
                        </td>
                        <td>
                            <img class="preview" src="{{ get_image('uploads/sliders/' . $slider->image) }}"
                                width="120px" alt="">
                        </td>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->status ? 'Active' : 'In-active' }}</td>
                        <td>{{ date_formatter($slider->created_at, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <x-backend.pagination :rows="$sliders" />
        </div>
    </x-backend.card>

</x-layouts.backend>
<x-layouts.backend>
    <x-backend.card>
        <form action="{{ route('settings.store') }}" method="post">
            @csrf

            <div class="row form-group">
                <div class="col-md-6">
                    <label for="name">{{ get_phrase('Name') }}</label>
                    <x-backend.input.default name="name" required="required" placeholder="Name" />
                </div>
                <div class="col-md-2">
                    <label for="type">Type</label>
                    <x-backend.input.select name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </x-backend.input.select>
                </div>
                <div class="col-md-4">
                    <label for="type">Group</label>
                    <x-backend.input.select name="group">
                        @foreach ($groups as $key => $group)
                        <option value="{{ $key }}">{{ ucfirst($group) }}</option>
                        @endforeach
                    </x-backend.input.select>
                </div>
            </div>
            <div class="form-group">
                <label for="value">Value</label>
                <x-backend.input.default name="value" placeholder="Value" />
            </div>
            <div class="mt-3">
                <x-backend.input.submit-btn />
            </div>
        </form>
    </x-backend.card>
    <x-backend.card>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>{{ get_phrase('Name') }}</th>
                        <th>Type</th>
                        <th>Group</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ ucfirst($item->type) }}</td>
                        <td>{{ $groups[$item->group] }}</td>
                        <td>{{ $item->value }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-backend.card>

</x-layouts.backend>

<script>
document.addEventListener('DOMContentLoaded', function() {
    updateFooterLinksJson(); // Initialize on page load
    document.getElementById('add-footer-link').addEventListener('click', function() {
        // ... rest of your code ...
    });
});
</script>
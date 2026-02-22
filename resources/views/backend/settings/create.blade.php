<x-layouts.backend>
    @include('errors.validation')
    <form action="{{ route(prefixed_route('settings.change')) }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-backend.card title="{{ get_phrase('Manage Footer Links') }}">
            <div id="footer-links-list">
                @php
                    $footerLinks = [];
                    $footerLinksRaw = $settings->where('key', 'footer_links')->first()->value ?? '';
                    if (!empty($footerLinksRaw)) {
                        $footerLinks = json_decode($footerLinksRaw, true) ?? [];
                    }
                @endphp
                @foreach ($footerLinks as $i => $link)
                    <div class="footer-link-row d-flex mb-2 align-items-center">
                        <input type="text" class="form-control mr-2 footer_link_title" placeholder="Title" value="{{ $link['title'] ?? '' }}" required>
                        <input type="url" class="form-control mr-2 footer_link_url" placeholder="URL" value="{{ $link['url'] ?? '' }}" required>
                        <button type="button" class="btn btn-secondary btn-sm move-link-up mr-1" title="Move Up">&#8593;</button>
                        <button type="button" class="btn btn-secondary btn-sm move-link-down mr-1" title="Move Down">&#8595;</button>
                        <button type="button" class="btn btn-danger btn-sm remove-footer-link">&times;</button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-info btn-sm mt-2" id="add-footer-link">+ {{ get_phrase('Add Link') }}</button>
            <input type="hidden" name="footer_links" id="footer-links-json">
        </x-backend.card>
        <div class="row mt-4">
            @foreach ($settings->groupBy('group') as $group => $items)
            <div class="col-md-6 mb-2">
                <x-backend.card title="{{ $groups[$group] }}">
                    @foreach ($items as $item)
                        @if ($item->key !== 'footer_links' && strpos($item->key, 'link_url_') !== 0 && strpos($item->key, 'link_title_') !== 0)
                            <div class="form-group">
                                <label for="{{ $item->key }}" class="form-label">
                                    @if ($item->key === 'person2_phone')
                                        Person 2 Phone
                                    @else
                                        {{ $item->name }}
                                    @endif
                                </label>
                                <x-backend.input.default type="{{ $item->type }}" name="{{ $item->key }}" value="{{ $item->value }}" />
                            </div>
                            @if ($item->key === 'person_detail_2' && $settings->where('key', 'person2_phone')->count())
                                <div class="form-group">
                                    <label for="person2_phone" class="form-label">Person 2 Phone</label>
                                    <x-backend.input.default type="text" name="person2_phone" value="{{ $settings->where('key', 'person2_phone')->first()->value }}" />
                                </div>
                            @endif
                        @endif
                    @endforeach
                </x-backend.card>
            </div>
            @endforeach
        </div>
        <div class="mt-2">
            <x-backend.input.submit-btn text="{{ get_phrase('Update') }}" btn="info" classList="btn-block" />
        </div>
    </form>
    <script>
        function updateFooterLinksJson() {
            const rows = document.querySelectorAll('.footer-link-row');
            const links = [];
            rows.forEach(row => {
                const title = row.querySelector('.footer_link_title').value;
                const url = row.querySelector('.footer_link_url').value;
                if (title && url) {
                    links.push({ title, url });
                }
            });
            const json = JSON.stringify(links);
            document.getElementById('footer-links-json').value = json;
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Always initialize the hidden input with the current links
            updateFooterLinksJson();
            function attachInputListeners() {
                document.querySelectorAll('.footer_link_title, .footer_link_url').forEach(function(input) {
                    input.removeEventListener('input', updateFooterLinksJson); // Prevent duplicate listeners
                    input.addEventListener('input', updateFooterLinksJson);
                });
            }
            attachInputListeners();
            document.getElementById('add-footer-link').addEventListener('click', function() {
                const container = document.getElementById('footer-links-list');
                const div = document.createElement('div');
                div.className = 'footer-link-row d-flex mb-2 align-items-center';
                div.innerHTML = `<input type=\"text\" class=\"form-control mr-2 footer_link_title\" placeholder=\"Title\" required>
                    <input type=\"url\" class=\"form-control mr-2 footer_link_url\" placeholder=\"URL\" required>
                    <button type=\"button\" class=\"btn btn-secondary btn-sm move-link-up mr-1\" title=\"Move Up\">&#8593;</button>
                    <button type=\"button\" class=\"btn btn-secondary btn-sm move-link-down mr-1\" title=\"Move Down\">&#8595;</button>
                    <button type=\"button\" class=\"btn btn-danger btn-sm remove-footer-link\">&times;</button>`;
                container.appendChild(div);
                attachInputListeners();
                updateFooterLinksJson();
            });
            document.getElementById('footer-links-list').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-footer-link')) {
                    e.target.parentElement.remove();
                    updateFooterLinksJson();
                }
                if (e.target.classList.contains('move-link-up')) {
                    const row = e.target.parentElement;
                    if (row.previousElementSibling) {
                        row.parentNode.insertBefore(row, row.previousElementSibling);
                    }
                    updateFooterLinksJson();
                }
                if (e.target.classList.contains('move-link-down')) {
                    const row = e.target.parentElement;
                    if (row.nextElementSibling) {
                        row.parentNode.insertBefore(row.nextElementSibling, row);
                    }
                    updateFooterLinksJson();
                }
            });
            document.querySelector('form').addEventListener('submit', function(e) {
                updateFooterLinksJson();
            });
        });
    </script>
</x-layouts.backend>
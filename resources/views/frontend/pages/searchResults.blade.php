<x-layouts.frontend>
    <section class="about-section mt-5">
        <div class="container pt-2 pb-2 pl-4 pr-4">
            <div class="title">
                <h3 class="section-title">{{ $title }}</h3>
            </div>
            <div class="content">
                @if (count($results))
                <table>
                    @foreach ($results as $item)
                    <tr>
                        <th class="pt-4">
                            <h2 style="font-size: 25px;">{{ $item->title }}</h2>
                        </th>
                    </tr>
                    <tr>
                        <td class="pt-2">{{ $item->description }}</td>
                    </tr>
                    <tr>
                        <td class="pt-3"><a href="{{ route('page.single', $item->slug) }}"
                                class="btn btn-green pt-0 pb-0 pl-2 pr-2">Read More</a></td>
                    </tr>
                    @endforeach
                </table>
                @else
                <h5>No search results for this term.</h5>
                @endif
            </div>
        </div>
    </section>

</x-layouts.frontend>
<x-layout>

    @include('partials._hero')
    @include('partials._search')

    @if (request('tag'))
        <div class="p-2 mx-24 mb-4 text-center">
            <span style="font-size: var(--md-font-size); text-decoration: underline;">Filtered by tag</span>
            <span class="btn-gradient" style="font-size: var(--md-font-size);">
                {{ urldecode(request('tag')) }}
            </span>
        </div>
        <div class="p-2 mx-24 mb-4 text-center">
            <a href="/" class="btn-gradient">Clear Filter</a>
        </div>
    @endif

    @if (request('search'))
        <div class="p-2 mx-24 mb-4 text-center">
            <span style="font-size: var(--md-font-size); text-decoration: underline;">Filtered by search keyword</span>
            <span class="btn-gradient" style="font-size: var(--md-font-size);">
                {{ urldecode(request('search')) }}
            </span>
        </div>
        <div class="p-2 mx-24 mb-4 text-center">
            <a href="/" class="btn-gradient">Clear Search</a>
        </div>
    @endif


    @unless (count($listings) == 0)
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing">

            </x-listing-card>
        @endforeach
    @else
        <p>No listings</p>
    @endunless

</x-layout>

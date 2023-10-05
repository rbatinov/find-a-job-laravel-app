<x-layout>

    {{-- {{ dd($listings) }} --}}
    @include('partials._hero')
    @include('partials._search')

    
    @if (request('tag'))
        <div class="p-2 md:mx-24 min-[320px]:mx-4 mb-4 text-center" style="line-height:3rem;">
            <span style="font-size: var(--md-font-size); text-decoration: underline;">{{ __('labels.l_filtered_by') }}</span>
            <div class="btn-gradient" style="font-size: var(--md-font-size); display:inline-block; padding:5px;">
                {{ urldecode(request('tag')) }}
            </div>
            <div class="btn-gradient" style="margin-left:10px; font-size: var(--md-font-size); display:inline-block; padding:5px;">
                {{ __('labels.l_results_found', ['total' => $listings->total()]) }}
            </div>
        </div>
        <div class="p-2 mx-24 mb-4 text-center">
            <a href="{{ route('home_url') }}" class="btn-gradient">{{ __('labels.l_clear_filter_btn') }}</a>
        </div>
    @endif

    @if (request('search'))
        <div class="p-2 mx-24 mb-4 text-center">
            <span style="font-size: var(--md-font-size); text-decoration: underline;">{{ __('labels.l_search_by') }}</span>
            <div class="btn-gradient" style="font-size: var(--md-font-size); display:inline-block; padding:5px;">
                {{ urldecode(request('search')) }}
            </div>
        </div>
        <div class="p-2 mx-24 mb-4 text-center">
            <a href="{{ route('home_url') }}" class="btn-gradient">{{ __('labels.l_clear_search_by_btn') }}</a>
        </div>
    @endif


    @unless (count($listings) == 0)
        @foreach ($listings as $key => $listing)
            <x-listing-card :listing="$listing" :rowNumber="$listings->firstItem() + $key">

            </x-listing-card>
        @endforeach
    @else
        <x-no-listings></x-no-listings>

    @endunless

    <div class="mt-6 p-4 mx-24">
        {{ $listings->links() }}
    </div>

</x-layout>

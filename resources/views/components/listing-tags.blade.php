@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)    
@endphp

<ul class="flex listingTags">
    @foreach ( $tags as $tag )
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{ $tag }}"
                title="{{ __('labels.l_click_to_filter_by_tag_title') }}"
            >{{ $tag }}</a>
        </li>    
    @endforeach

    
</ul>